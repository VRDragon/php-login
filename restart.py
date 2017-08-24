from pyA20.gpio import gpio
from pyA20.gpio import port
from time import sleep
from subprocess import call


gpio.init()
gpio.setcfg(port.PG7, gpio.INPUT)

while 1:
        if button&(gpio.input(port.PG7)):
			try:
				db = MySQLdb.connect("localhost","root","orangepi","login" )
				cursor = db.cursor()
				sql = "UPDATE IP SET IP_adrr = 192.168.1.100  WHERE id=1;"
				cursor.execute(sql)
				results = cursor.fetchall()
				sql = "UPDATE users SET usernme = admin  WHERE id=1";
				cursor.execute(sql)
				results = cursor.fetchall()
				sql = "UPDATE users SET password = password WHERE id=1";
				cursor.execute(sql)
				results = cursor.fetchall()
				db.close()
				call(["ifconfig","eth0","down"])
				call(["ifconfig","eth0","192.168.1.100","netmask","255.255.255.0"])
				call(["ifconfig","eth0","up"])
			except:
				print "Error: unable to fecth data"
			db.close()