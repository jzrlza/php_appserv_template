import os, sys, json
import importer
print(json.dumps([{"a": 1, "b": 3}, {"a": 2, "b": importer.import_print()}]))