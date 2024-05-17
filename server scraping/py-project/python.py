# input wordt later afgehaald van docker
import mysql.connector
import os
import shutil
import requests
from dotenv import load_dotenv

load_dotenv()
serverip = os.getenv("REMOTE_SERVER")
db_gebruiker = os.getenv("RM_USER")
db_wachtwoord = os.getenv("RM_PASS")
db_db = os.getenv("RM_DB")

localip = os.getenv("LOCAL_SERVER")
loc_gebruiker = os.getenv("LO_USER")
loc_wachtwoord = os.getenv("LO_PASS")
loc_db = os.getenv("LO_DB")

db = mysql.connector.connect(
  host=serverip,
  user=db_gebruiker,
  password=db_wachtwoord,
  database=db_db
)
locdb = mysql.connector.connect(
  host=localip,
  user=loc_gebruiker,
  password=loc_wachtwoord,
  database=loc_db
)

def quit():
   db.close()
   locdb.close()
   exit(0)

local_cursor = locdb.cursor()
cursor = db.cursor()
siteurl = ""
filenames = []
try:
   local_cursor.execute("SELECT * FROM `wp_options` WHERE option_id=1;")
   querry_res = local_cursor.fetchall()
   siteurl = querry_res[0][2] #zo laten sinds poort juist en standaard staat url op localhost
   #siteurl = "localhost" #error met als je hem van het internet haalt, dan verliest ie zijn ip address.
   local_cursor.execute("SELECT * FROM `wp_posts` WHERE post_type='attachment';")
   results = local_cursor.fetchall()
   for row in results:
      url = row[18]
      filenames.append(url.split('/')[-1])
except:
   print("error met lokale database")
   quit()

try:
   cursor.execute("SELECT * FROM `wp_posts` WHERE post_type='attachment';")
except:
   print("Error: unable to fecth data")
   quit()
results = cursor.fetchall()
for row in results:
    #print(row) = (98, 1, datetime.datetime(2024, 5, 1, 16, 25, 10), datetime.datetime(2024, 5, 1, 16, 25, 10), '', 'arcade', '', 'inherit', 'open', 'closed', '', 'arcade', '', '', datetime.datetime(2024, 5, 1, 16, 25, 10), datetime.datetime(2024, 5, 1, 16, 25, 10), '', 0, 'http://localhost:8080/wp-content/uploads/2024/05/arcade-1.gif', 0, 'attachment', 'image/gif', 0)
    url = row[18]
    filename = url.split('/')[-1]
    if(not filename in filenames):
      path = "./downloads/"+filename
      with requests.get(url, stream=True) as r:
               with open(path, 'wb') as f:
                  shutil.copyfileobj(r.raw, f)
      lst = list(row)
      lst[18] = siteurl + "/wp-content/downloads/" + filename
      lst = lst[1:]
      lst[1] = lst[1].strftime("%Y-%m-%d %H:%M:%S")
      lst[2] = lst[2].strftime("%Y-%m-%d %H:%M:%S")
      lst[13] = lst[13].strftime("%Y-%m-%d %H:%M:%S")
      lst[14] = lst[14].strftime("%Y-%m-%d %H:%M:%S")
      row = tuple(lst)
      try:
         stri = "INSERT INTO wp_posts (post_author,post_date,post_date_gmt,post_content,post_title,post_excerpt,post_status,comment_status,ping_status,post_password,post_name,to_ping,pinged,post_modified,post_modified_gmt,post_content_filtered,post_parent,guid,menu_order,post_type,post_mime_type,comment_count) Values" + str(row)
         local_cursor.execute(stri)
         print(stri)
         print("upload van bestand",filename)
      except:
         print("Error bij updaten database")
         quit()
    else:
      del filenames[filenames.index(filename)]
locdb.commit()
#degene die overbleven in de filenames lijst zijn bestanden die al verwijdert waren
for bestand in filenames:
   local_cursor.execute("DELETE from wp_posts where post_type='attachment' and guid like '%"+"downloads/"+ bestand +"'")
   os.remove("./downloads/"+bestand)
locdb.commit()
quit()
