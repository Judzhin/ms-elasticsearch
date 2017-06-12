#!/usr/bin/env bash
curl -XGET "127.0.0.1:9200/blog/post/_search?pretty" -d'
{
  "size": 1,
  "_source": ["title", "published_at"],
  "sort": [{"published_at": "desc"}]
}'