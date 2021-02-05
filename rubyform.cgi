#!/usr/bin/ruby -w

puts "Content-type: text/html\n\n"
require 'cgi'
cgi=CGI.new


first= cgi['first']
last=cgi['last']
address=cgi['address']
puts"<html><body>"
puts "Your first name: " + first
puts "<br/>"
puts "Your last name: " + last
puts "<br/>"
puts "Your address: " + address.split.map(&:capitalize).join(' ')
puts "<br/>"
puts "Your phone number: "

puts '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>'
puts '<script type="text/javascript">'

puts 'var phone="' + cgi['phone'] + '";'
puts <<ANIMATE


var partial = phone.split("-");
document.write("<span class='one' style='color:red; font-size: 4em;'>" + partial[0] +"</span>");

$('.one').hide().fadeIn(500);
document.write("<span class='two' style='color:pink; font-size: 4em;'>-" + partial[1] + "</span>");

$('.two').hide().fadeIn(1500);

document.write("<span class='three' style='color:purple; font-size: 4em;'>-" + partial[2] + "</span>");

$('.three').hide().fadeIn(4000);

ANIMATE

puts '</script>'

puts "</body></html>"
