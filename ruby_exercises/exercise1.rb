# just exercise 
 
=begin 


		comment

		comment




puts "hello"
puts "coding"
puts "dojo"

puts "hello"
puts "coding"

BEGIN {
	puts "this is in the begin block"
}

END {
	puts "this is in the end block"
}


x = 10
y = 1232 
z = x * y


x=5; y=10;z=x+y

puts z


first_name = "Dan"
last_name = "Basinski"
puts "Your name is "
puts first_name
puts last_name



puts "Your name is " + first_name + " " + last_name




puts "First name is #{first_name} and last name is #{last_name}"


puts "First name is %s and last name is %s" % [first_name, last_name]



z = 50 
puts "Value of z is #{z}"


=end
#!/usr/bin/ruby 

for i in 0..5 
  puts "Value of local variable is #{i}" 
end