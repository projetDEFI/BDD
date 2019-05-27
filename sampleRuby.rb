# the filter method receives an event and must return a list of events.
# Dropping an event means not including it in the return array,
# while creating new ones only requires you to add a new instance of
# LogStash::Event to the returned array
def filter(event)
orderid =event.get("orderid")
product = event.get("product")
description = event.get("description")
price = event.get("price")
ordertime = event.get("ordertime")
orderDetails ={
   "orderid" => orderid,
   "product" => product,
   "description" => description,
   "price" => price,
   "ordertime" => ordertime
}
event.set('orderDetails',orderDetails)
event.remove('orderid')
event.remove('product')
event.remove('description')
event.remove('price')
event.remove('ordertime')
return [event]  
end