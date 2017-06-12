#!/usr/bin/env bash
curl -XGET "127.0.0.1:9200/blog/post/_search?pretty" -d'
{
  "filter": {
    "range": {
      "published_at": { "gte": "2014-09-01" }
    }
  }
}'