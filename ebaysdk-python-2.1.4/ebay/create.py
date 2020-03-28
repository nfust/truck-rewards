#!/usr/bin/env python3
from ebaysdk.finding import Connection
import sys

class Item:
	def __init__(self, name, cost, image):
		self.name = name
		self.cost = cost
		self.image = image
items = []
if (len(sys.argv) >1):
	keywords = sys.argv[1]
else:
	keywords = "bumper sticker"
if (len(sys.argv) > 2):
	sortOrder = sys.argv[2]
else:
	sortOrder = "BestMatch"
if __name__ == '__main__':
	api = Connection(config_file='ebay.yaml', debug=True, siteid="EBAY-US")

	request = {
	        'keywords': keywords,
	        'itemFilter': [
	            {'name': 'condition', 'value': 'new'}
	        ],
	        'paginationInput': {
	            'entriesPerPage': 10,
	            'pageNumber': 1
	        },
		'sortOrder' : sortOrder
		
	    }


	response = api.execute('findItemsByKeywords', request)
	for item in response.reply.searchResult.item:
		new = Item(item.title, item.sellingStatus.currentPrice.value, item.galleryURL)	
		items.append(new)

#print("args", str(sys.argv))
#print("arg", sys.argv[1])
myfile = open('catalog.html', 'w')
myfile.seek(0)
myfile.truncate()
html =  """
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <style>
      img {
        margin-top: 1%;
        height: 10%;
        width: 10%;
      }

      p{display: inline}
<<<<<<< HEAD

      table{border:1px;}

=======

>>>>>>> 8372600e0e757ab5e4317ec9b6e9cc72593ecfb8
    </style>
   
    <link rel="stylesheet" href="catalog.css">

    <title>Catalog</title>
  </head>
  <body>
	
    <nav>
      <a href="catalog.html">Catalog</a> |
      <a href="purchaseHistory.html">Purchase History</a> |
      <a href="pendingOrders.html">Pending Orders</a> |
      <a href="sponsorInfo.html">Sponsor Info</a>
	    
      <div class="logout">
        <form align="right" class="form" method="post" action="http://3.83.252.232:3001/logout">
          <button name="logout" type="submit">Log Out</button>
        </form>
      </div>
	    
    </nav>
	<link rel="stylesheet" type="text/css" href="catalog.css">
</head>
<ul class="products"> """
for i in range(10):
	html += """<item>
        <img src=\""""+items[i].image+"""\" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4>"""+items[i].name+"""</h4>
            <p>"""+items[i].cost+""" points</p>
        </a>
    </item>"""
html +="""
</ul>
    Field2: <input type="text" id="field2"><br><br>
    

	
  </body>
</html>"""
myfile.write(html)
myfile.close()






