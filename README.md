
## Documentation

First I added a client directory which contains all sources [BestHotels&TopHotels] and these classes extend from Guzzle Client <br>
In AppServiceProvider, I injected these classes on App with singleton approach <br> 

Then I made an event [HotelsCrawling] with to listeners [BestHotels&TopHotels] and these listeners extend from base class <br>
In EventServiceProvider, I linked these listeners with the event

Then I made a service called HotelService which responsible of firing the event and retrieving data <br>
Also In AppServiceProvider I injected this service and passed Request object to it's constructor <br>
In this constructor we can validate the request params as need <br>
in getData function we fire the events and listener executing then we get the response and sort it <br>
and this what called in HotelController



NOTE: I used newsapi to test response on Clients