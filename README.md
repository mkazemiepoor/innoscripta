Project Documentation: Laravel Article Fetching System
Project Overview
This project is a Laravel-based application that fetches articles from multiple news APIs, stores them in a database, and exposes them through a RESTful API. It allows users to filter and paginate articles based on various criteria (category, author, date, etc.) and interact with the data via endpoints.
Features:
•	Fetches articles from three major news sources: The Guardian, NewsAPI, and New York Times.
•	Stores articles in a local database for later retrieval.
•	Exposes an API that allows querying articles based on filters like category, author, source, and date range.
•	Regularly fetches new articles through a scheduled task.
________________________________________
Technology Stack
•	Backend: Laravel 10.x (PHP)
•	Database: MySQL (or your preferred DB)
•	Frontend: No frontend for this project (API only)
•	Libraries/Tools:
o	Carbon: Date handling
o	HTTP Client (Guzzle): Making requests to external APIs
o	Artisan Commands: For scheduling the article fetches
o	GitHub: Version control and collaboration
________________________________________
Project Structure
1.	API Integration:
The project interacts with three external APIs to fetch articles:
o	The Guardian API
o	NewsAPI
o	New York Times API
2.	Fetching Logic:
The articles are fetched using separate services:
o	GuardianService: Fetches articles from The Guardian API.
o	NewsApiService: Fetches articles from NewsAPI.
o	NewYorkTimesService: Fetches articles from the New York Times API.
These services are invoked in a scheduled task that runs periodically (every minute, for example).
3.	Database Schema:
Articles are saved in the articles table with the following fields:
o	title
o	author
o	content
o	source
o	category
o	published_at
o	url
o	url_to_image
o	description
o	section
o	subsection
o	uri
o	created_at
o	updated_at
4.	Controllers:
o	ArticleController: Provides the API for retrieving articles based on filters such as category, author, source, and date.
5.	Scheduled Task:
The articles are fetched on a regular basis using a Laravel Artisan command fetch:articles scheduled in the Kernel.php file.
________________________________________
Setting Up The Project
Prerequisites:
1.	PHP 8.0 or higher
2.	Composer
3.	MySQL (or your preferred database)
4.	Laravel 10.x
5.	API Keys for:
o	The Guardian API (GUARDIAN_API_KEY)
o	NewsAPI (NEWSAPI_API_KEY)
o	New York Times API (NYTIMES_API_KEY)
Installation:
1.	Clone the repository:
git clone https://github.com/mkazemiepoor/innoscripta.git
cd innoscripta
2.	Install dependencies:
composer install
3.	Set up environment: Copy the .env.example to .env:
cp .env.example .env
Add your API keys to the .env file:
GUARDIAN_API_KEY=your-guardian-api-key
NEWSAPI_API_KEY=your-newsapi-api-key
NYTIMES_API_KEY=your-nytimes-api-key
4.	Generate the application key:
php artisan key:generate
5.	Run the migrations:
php artisan migrate
6.	Run the scheduled task:
php artisan fetch:articles
7.	Start the local server:
php artisan serve
Your application should now be up and running on http://localhost:8000.
API Endpoints
GET /api/articles
Fetches a list of articles with optional filters.
Query Parameters:
•	page: The page number for pagination (default: 1)
•	per_page: The number of articles per page (default: 10)
•	category: Filter by article category
•	author: Filter by author
•	source: Filter by source (e.g., NewsAPI, The Guardian, New York Times)
•	date_from: Filter by start date (format: YYYY-MM-DD)
•	date_to: Filter by end date (format: YYYY-MM-DD)
Example Request:
GET /api/articles?page=2&per_page=5&category=technology
Response:
{
  "data": [
    {
      "id": 1,
      "title": "Article Title",
      "author": "Author Name",
      "published_at": "2025-01-27T12:00:00",
      "content": "Article content...",
      "source": "NewsAPI",
      "category": "Technology",
      ...
    }
  ]
}
GitHub Workflow
•	Version Control: The project is hosted on GitHub for version control and collaboration. You can clone the repository or contribute through pull requests.
•	Branching: The main branch is main, with feature branches being used for new developments.
•	Commits: Ensure to write clear commit messages that explain the purpose of the changes.
Cron Jobs & Scheduling
In order to run the scheduled tasks for fetching articles, you need to set up Laravel's task scheduler. In a production environment, you can add the following to your server's crontab to run every minute:
* * * * * cd /path-to-your-project && php artisan fetch:articles >> /dev/null 2>&1
Contributing
If you'd like to contribute to the project, feel free to fork the repository and create a pull request. Here are some ways you can help:
•	Report bugs
•	Suggest new features or improvements
•	Submit code changes

