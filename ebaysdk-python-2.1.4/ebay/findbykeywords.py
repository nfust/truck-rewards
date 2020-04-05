#!/usr/bin/env python3
from ebaysdk.finding import Connection
import sys
import json

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
	i = 0
	output = {}
	for item in response.reply.searchResult.item:
	    output.update([(str(i) +'title', item.title),(str(i)+ 'price', item.sellingStatus.currentPrice.value),(str(i) +'URL', item.galleryURL)])
	    i = i + 1
	print (json.dumps(output))

#print("args", str(sys.argv))
#print("arg", sys.argv[1])


#FORMAT FOR CALL IS python3 findbykeywords.py (keywords in "" format") (sortOrder examples below)


#Sort Orders: PROBABLY SHOULD NOT USE MOST OF THESE
#BestMatch

#BidCountFewest

#BidCountMost


#CountryAscending 

#CountryDescending

#CurrentPriceHighest

#DistanceNearest

#EndTimeSoonest

#PricePlusShippingHighest

#PricePlusShippingLowest

#StartTimeNewest

#WatchCountDecreaseSort

