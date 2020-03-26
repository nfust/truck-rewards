#!/usr/bin/env python3
from ebaysdk.finding import Connection
import sys

keywords = sys.argv[1]
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
	    print ("Title: ",item.title,", Price: ",item.sellingStatus.currentPrice.value)

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

