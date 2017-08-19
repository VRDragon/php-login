import MySQLdb
from subprocess import call
# Open database connection
db = MySQLdb.connect("localhost","root","orangepi","login" )

# prepare a cursor object using cursor() method
cursor = db.cursor()

sql = "SELECT* FROM IP  WHERE IP_adrr ;"
try:
   cursor.execute(sql)
   results = cursor.fetchall()
   for row in results:
      ip = row[1]
      # Now print fetched result
      print "ip=%s" % \
             (ip)
   call(["ifconfig","eth0","down"])
   call(["ifconfig","eth0",ip,"netmask","255.255.255.0"])
   call(["ifconfig","eth0","up"])
except:
   print "Error: unable to fecth data"

# disconnect from server
db.close()
