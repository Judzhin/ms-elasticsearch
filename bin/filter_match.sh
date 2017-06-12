#!/usr/bin/env bash
curl -XGET "127.0.0.1:9200/blog/post/_search?pretty" -d'
{
  "_source": false,
  "query": {
    "match": {
      "content": "история"
    }
  }
}'