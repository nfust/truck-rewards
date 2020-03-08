#!/usr/bin/env python3
from ebaysdk.finding import Connection

if __name__ == '__main__':
    api = Connection(config_file='ebay.yaml', debug=True, siteid="EBAY-US")

    request = {
        'keywords': 'joycons',
        'itemFilter': [
            {'name': 'condition', 'value': 'new'}
        ],
        'paginationInput': {
            'entriesPerPage': 10,
            'pageNumber': 1
        },
    }


    response = api.execute('findItemsByKeywords', request)
for item in response.reply.searchResult.item:
    print("Title: ",item.title,", Price: ",item.sellingStatus.currentPrice.value)
