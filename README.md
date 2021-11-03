#MessageBus

This solution will keep track of topics -> subscribers where a topic is a string and a subscriber is an HTTP endpoint. When a message is published on a topic, it is  forwarded to all subscriber endpoints.

The Solution was developed Laravel 8.x

The implementation is a RESTful API to perform the afore-mentioned task.

There several resources to:
1. Create a Topic
2. Subscribe to a Topic, the system checks if the topic exists and then add subscribers if not a topic is created and subscribers added
3. Public a topic

The backend is design using repository pattern (applying SOLID principles), it makes use of laravel queues and Http resources.

Usage (This Document assumes that the below applcation will run on a windows system)
1. Open the application with any IDE of choice, there are two applications Publisher and Subscriber
2. The Publisher API uses my SQL database, in .env file change the database connection string as appropriate. Ensure that QUEUE_CONNECTION parameter
	is set to database.
3. Three .bat files (initialize_queue.bat, start_publiser.bat, start_subscriber.bat) are included with the project, change path to PHP executable
	and folder location where the application is stored.
4. Run the application in the following order start_publiser.bat, initialize_queue.bat, start_subscriber.bat


NOTE: A postman collection has also been added to the to project see link https://go.postman.co/workspace/My-Workspace~ead04592-78f4-4172-8ad7-7f39b97f18b3/collection/1408454-86296446-276d-4400-bae4-944374c56e05