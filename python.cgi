#!/usr/bin/python 
import cgi, cgitb
form=cgi.FieldStorage()

first=form.getvalue('first')
last=form.getvalue('last')
address=form.getvalue('address')
phone=form.getvalue('phone')

print "Content-type:text/html\n\n"
print "<html><body>"
print '<br>Your first name is: ' + first
print '<br>Your last name is: ' + last
print '<br>Your address is: ' + address
print '<br>Phone Number:<br>'

print '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>'
print '<script type="text/javascript">'
print 'var phone = "' + phone + '";'
print """var partial = phone.split("-");
document.write("<span class='one' style='color: green; font-size: 4em'>" + partial[0] + "</span>");

$('.one').animate({fontSize: '4em'}, "slow");
document.write("<span class='two' style='color:pink; font-size: 4em; opacity: 0.5;'>- " + partial[1] + "</span>");

$('.two').delay(2000).animate({margin: '40px', opacity: '1.0'}, "slow");
document.write("<span class='three' style='color:blue; font-size: 4em;'>- " + partial[2] + "</span>");

$('.three').delay(4000).animate({letterSpacing: '24px'}, "slow");

</script>


</body>


</html>


"""

