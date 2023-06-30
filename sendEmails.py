"""
Automatically sending emails to user's to alert them
"""

import smtplib, ssl

import mysql.connector


# https://realpython.com/python-send-email/
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

# Connect to MySQL
connection = mysql.connector.connect(user='root', password='1234', host='localhost')

cursor = connection.cursor()

try:
    cursor.execute("USE CommonsSchema")
except:
    print("Error selecting schema")
    exit(1)

# Import date class from datetime module
from datetime import date
  
# Returns the current local date
today = date.today()


# Get meals for today - store as nested dictionary with info about meal period etc
favoritesDict = {}

# Get all users' emails
getUsers = "SELECT email FROM users"
cursor.execute(getUsers)

emails = cursor.fetchall()
emailList = []

for x in emails:
    emailList.append(x[0])

#Loop through these emails and check their favorited meals against the current days' meals
for email in emailList:
    # Get a specific user's favorited meals 
    #getFavoriteMeals = "SELECT mealName FROM \
     #   ((SELECT * FROM FavoriteMeals WHERE email = '{}' AND alert=true) AS favorites \
     #   LEFT JOIN \
     #   (SELECT * FROM Meals) AS meals \
     #   ON favorites.mealId = meals.mealId )".format(email)

    getFavoriteMeals = "SELECT mealName FROM FavoriteMeals WHERE email = '{}' AND alert=true".format(email)

    #connection2 = mysql.connector.connect(user='root', password='1234', host='localhost')
    #newCursor = connection.cursor()
    #cursor.execute("USE CommonsSchema")
    cursor.execute(getFavoriteMeals)
    favoritesList = []
    favorites = cursor.fetchall()
    for x in favorites:
        favoritesList.append(x[0])
    
    favoritesDict[email] = favoritesList


# Need to query the current day's meals and create a list of those - maybe dictionary with info about meal time, station, etc
getTodaysMeals = "SELECT mealName, mealType, mealPeriod, station, score FROM meals WHERE mealDate = '{}'".format("2022-01-22")
cursor.execute(getTodaysMeals)
todaysMeals = cursor.fetchall()


# Create dictionary to make checking meal prescence quick and easy
todaysMealsDict = {}
for meal in todaysMeals:
    todaysMealsDict[meal[0]] = {'mealType': meal[1], 'mealPeriod': meal[2], 'station': meal[3], 'score': meal[4]}

print(todaysMealsDict)


# Then compare this list to that of each of the users 
# Loop through favoritesDict which has emails as keys and favorite menu items at values
# Send email to each user within for loop
port = 587  
smtp_server = "smtp.gmail.com"
# Check whether ports are open https://stackoverflow.com/questions/10127691/how-can-i-check-if-ports-465-and-587-are-open-with-php
password = "vailcommonts8106$"
sender_email = "vailcommonts@gmail.com"
# Create a secure SSL context
context = ssl.create_default_context()


def createHTML(matches, receiver_email, message, todaysMeals):
    message["Subject"] = "ALERT"
    message["From"] = "Vail Comments"
    message["To"] = receiver_email

    html = """\
    <html>
    <body>
    <h2>Your liked meals on the menu today:</h2>
    <ul> """
    
    for match in matches:
        html +=  """
        <li>""" + match + " (" + todaysMeals[match]['mealPeriod'] + ")" +  """</li>"""

    html += """
    </ul>

    <br>
    <br>
    <a href="vailcomments.com">vailcomments.com</a>
    
    </body>
    </html>
    """

    return html

def createText(matches, receiver_email, todaysMeals):
    # Create matches string
    matchesString = ""
    if len(matches) == 1:
        matchesString = matches[0] + " (" + todaysMeals[matches[0]]['mealPeriod'] + ")"
    elif len(matches) == 2:
        matchesString = matches[0] + " (" + todaysMeals[matches[0]]['mealPeriod'] + ")" + " and "  + matches[1] + " (" + todaysMeals[matches[1]]['mealPeriod'] + ")"
    else:
        for i in range(len(matches)-1):
            matchesString += matches[i] + " (" + todaysMeals[matches[i]]['mealPeriod'] + "), "
        matchesString += "and " + matches[len(matches)-1] + " (" + todaysMeals[matches[len(matches)-1]]['mealPeriod'] + ")"
    # Pay close attention to the format of the message including spaces and returns!!
    message = """\
To: """ + receiver_email + """
Subject: IMPORTANT

Some of your liked Vail Commons menu items will be available today!!. """ \
        + """They are: """ + matchesString

    return message


for email in favoritesDict:
    print('-----')
    # Check to see if any items are on today's menu
    # If so add them to the mathes list
    matches = []

    for item in favoritesDict[email]:
        if item in todaysMealsDict:
            matches.append(item)


    # Only if the user HAS a match
    if len(matches) != 0:
        receiver_email = "aldonald@davidson.edu" #WILL CHANGE TO email
        # Dynamically generate HTML to show on the email

        # Using the mime library to add html content to better display results
        message = MIMEMultipart("alternative")

        html = createHTML(matches, receiver_email, message, todaysMealsDict)
        print(html)
        text = createText(matches, receiver_email, todaysMealsDict)
        print(text)

        # Turn these into plain/html MIMEText objects
        part1 = MIMEText(text, "plain")
        part2 = MIMEText(html, "html")

        # Add HTML/plain-text parts to MIMEMultipart message
        # The email client will try to render the last part first
        message.attach(part1)
        message.attach(part2)

        # Create a tls smpt connection
        
        server = smtplib.SMTP(smtp_server, port)
        server.ehlo()  # Can be omitted
        # Need to specify NO keyfile or certfile https://docs.python.org/3/library/smtplib.html#smtplib.SMTP.ehlo
        server.starttls(keyfile=None, certfile=None, context=context)
        server.ehlo()  # Can be omitted
        server.login(sender_email, password)
        server.sendmail(sender_email, receiver_email, message.as_string())
        
        # USING SSL - davidson domains doesn't like port 465
        
        # with smtplib.SMTP_SSL("smtp.gmail.com", port, context=context) as server:
        #     server.login("vailcommonts@gmail.com", password)
        #     server.sendmail(sender_email, receiver_email, message.as_string())

    print('-----')

# Send email based on those that match up including info about the matches in the email

    


#tourney_string = "INSERT INTO Tournament (tournament_name, surface, draw_size) VALUES ({}, {}, {})".format(
    #t_name, surface, draw_size)
#print(tourney_string)
#cursor.execute(tourney_string)
        

connection.commit()
cursor.close()
connection.close()






# port = 465  # For SSL
# password = "vailcommonts8106$"

# sender_email = "vailcommonts@gmail.com"
# receiver_email = "aldonald@davidson.edu"
# message = """\
# To:""" + receiver_email + """
# Subject: IMPORTANT

# Sign up now for priority access to Vail Commonts."""

# # Create a secure SSL context
# context = ssl.create_default_context()

# #context=context needed in this case!!
# with smtplib.SMTP_SSL("smtp.gmail.com", port, context=context) as server:
#     server.login("vailcommonts@gmail.com", password)
#     server.sendmail(sender_email, receiver_email, message)
#     # TODO: Send email here



# port = 587  # For starttls

# smtp_server = "smtp.gmail.com"
# sender_email = "vailcommonts@gmail.com"
# receiver_email = "aldonald@davidson.edu"
# password = "vailcommonts8106$"
# message = """\
# Subject: Hi there

# This message is sent from Python."""

# context = ssl.create_default_context()
# server = smtplib.SMTP(smtp_server, port)
# server.ehlo()  # Can be omitted
# # Need to specify NO keyfile or certfile https://docs.python.org/3/library/smtplib.html#smtplib.SMTP.ehlo
# server.starttls(keyfile=None, certfile=None, context=context)
# server.ehlo()  # Can be omitted
# server.login(sender_email, password)
# server.sendmail(sender_email, receiver_email, message)





#https://packaging.python.org/en/latest/tutorials/installing-packages/