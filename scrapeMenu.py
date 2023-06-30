#WOULD NEED TO USE SELENIUM OR SOME WEB DRIVER TO SCRAPE SINCE DATA
# AUTOMATICALLY GENERATED WITH JAVASCRIPT 


from lxml import html
import requests

page = requests.get('http://econpy.pythonanywhere.com/ex/001.html')
tree = html.fromstring(page.content)
print(tree)
#This will create a list of buyers:
buyers = tree.xpath('//div[@title="buyer-name"]/text()')
#This will create a list of prices
prices = tree.xpath('//span[@class="item-price"]/text()')

print('Buyers: ', buyers)
print('Prices: ', prices)


# Resource - https://docs.python-guide.org/scenarios/scrape/
page = requests.get('https://usa.jamix.cloud/menu/')
tree = html.fromstring(page.text)
print(page.text)


menuItems = tree.xpath('//*[@id="main-view"]/div/div/div[1]/div/div/div/div[2]/div[1]/div/text()')
print(menuItems)


