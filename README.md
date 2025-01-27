
<p class=MsoNormal style='line-height:normal'><b><span style='font-size:24.0pt;
font-family:"Times New Roman",serif'>Project Documentation: Laravel Article
Fetching System</span></b></p>

<p class=MsoNormal style='line-height:normal'><b><span style='font-size:18.0pt;
font-family:"Times New Roman",serif'>Project Overview</span></b></p>

<p class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
font-family:"Times New Roman",serif'>This project is a <b>Laravel-based
application</b> that fetches articles from multiple news APIs, stores them in a
database, and exposes them through a RESTful API. It allows users to filter and
paginate articles based on various criteria (category, author, date, etc.) and
interact with the data via endpoints.</span></p>

<p class=MsoNormal style='line-height:normal'><b><span style='font-size:13.5pt;
font-family:"Times New Roman",serif'>Features:</span></b></p>

<ul type=disc>
 <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Fetches articles from three major
     news sources: <b>The Guardian</b>, <b>NewsAPI</b>, and <b>New York Times</b>.</span></li>
 <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Stores articles in a local database
     for later retrieval.</span></li>
 <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Exposes an API that allows querying
     articles based on filters like category, author, source, and date range.</span></li>
 <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Regularly fetches new articles
     through a scheduled task.</span></li>
</ul>

<div class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:12.0pt;font-family:
"Times New Roman",serif'>

<hr size=3 width="100%" align=center>

</span></div>

<p class=MsoNormal style='line-height:normal'><b><span style='font-size:18.0pt;
font-family:"Times New Roman",serif'>Technology Stack</span></b></p>

<ul type=disc>
 <li class=MsoNormal style='line-height:normal'><b><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Backend</span></b><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'>: Laravel
     10.x (PHP)</span></li>
 <li class=MsoNormal style='line-height:normal'><b><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Database</span></b><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'>: MySQL (or
     your preferred DB)</span></li>
 <li class=MsoNormal style='line-height:normal'><b><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Frontend</span></b><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'>: No frontend
     for this project (API only)</span></li>
 <li class=MsoNormal style='line-height:normal'><b><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Libraries/Tools</span></b><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'>:</span></li>
 <ul type=circle>
  <li class=MsoNormal style='line-height:normal'><b><span style='font-size:
      12.0pt;font-family:"Times New Roman",serif'>Carbon</span></b><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>: Date
      handling</span></li>
  <li class=MsoNormal style='line-height:normal'><b><span style='font-size:
      12.0pt;font-family:"Times New Roman",serif'>HTTP Client (Guzzle)</span></b><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>: Making
      requests to external APIs</span></li>
  <li class=MsoNormal style='line-height:normal'><b><span style='font-size:
      12.0pt;font-family:"Times New Roman",serif'>Artisan Commands</span></b><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>: For
      scheduling the article fetches</span></li>
  <li class=MsoNormal style='line-height:normal'><b><span style='font-size:
      12.0pt;font-family:"Times New Roman",serif'>GitHub</span></b><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>: Version
      control and collaboration</span></li>
 </ul>
</ul>

<div class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:12.0pt;font-family:
"Times New Roman",serif'>

<hr size=3 width="100%" align=center>

</span></div>

<p class=MsoNormal style='line-height:normal'><b><span style='font-size:18.0pt;
font-family:"Times New Roman",serif'>Project Structure</span></b></p>

<ol start=1 type=1>
 <li class=MsoNormal style='line-height:normal'><b><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>API Integration</span></b><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'>:<br>
     The project interacts with three external APIs to fetch articles:</span></li>
 <ul type=circle>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
      font-family:"Times New Roman",serif'>The Guardian API</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
      font-family:"Times New Roman",serif'>NewsAPI</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
      font-family:"Times New Roman",serif'>New York Times API</span></li>
 </ul>
 <li class=MsoNormal style='line-height:normal'><b><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Fetching Logic</span></b><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'>:<br>
     The articles are fetched using separate services:</span></li>
 <ul type=circle>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>GuardianService</span><span style='font-size:
      12.0pt;font-family:"Times New Roman",serif'>: Fetches articles from The
      Guardian API.</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>NewsApiService</span><span style='font-size:
      12.0pt;font-family:"Times New Roman",serif'>: Fetches articles from
      NewsAPI.</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>NewYorkTimesService</span><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>: Fetches
      articles from the New York Times API.</span></li>
 </ul>
</ol>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><span
style='font-size:12.0pt;font-family:"Times New Roman",serif'>These services are
invoked in a scheduled task that runs periodically (every minute, for example).</span></p>

<ol start=3 type=1>
 <li class=MsoNormal style='line-height:normal'><b><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Database Schema</span></b><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'>:<br>
     Articles are saved in the </span><span style='font-size:10.0pt;font-family:
     "Courier New"'>articles</span><span style='font-size:12.0pt;font-family:
     "Times New Roman",serif'> table with the following fields:</span></li>
 <ul type=circle>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>title</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>author</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>content</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>source</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>category</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>published_at</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>url</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>url_to_image</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>description</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>section</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>subsection</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>uri</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>created_at</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>updated_at</span></li>
 </ul>
 <li class=MsoNormal style='line-height:normal'><b><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Controllers</span></b><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'>:</span></li>
 <ul type=circle>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:10.0pt;
      font-family:"Courier New"'>ArticleController</span><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>: Provides
      the API for retrieving articles based on filters such as </span><span
      style='font-size:10.0pt;font-family:"Courier New"'>category</span><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>, </span><span
      style='font-size:10.0pt;font-family:"Courier New"'>author</span><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>, </span><span
      style='font-size:10.0pt;font-family:"Courier New"'>source</span><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>, and </span><span
      style='font-size:10.0pt;font-family:"Courier New"'>date</span><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>.</span></li>
 </ul>
 <li class=MsoNormal style='line-height:normal'><b><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Scheduled Task</span></b><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'>:<br>
     The articles are fetched on a regular basis using a Laravel Artisan
     command </span><span style='font-size:10.0pt;font-family:"Courier New"'>fetch:articles</span><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'> scheduled in
     the </span><span style='font-size:10.0pt;font-family:"Courier New"'>Kernel.php</span><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'> file.</span></li>
</ol>

<div class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:12.0pt;font-family:
"Times New Roman",serif'>

<hr size=3 width="100%" align=center>

</span></div>

<p class=MsoNormal style='line-height:normal'><b><span style='font-size:18.0pt;
font-family:"Times New Roman",serif'>Setting Up The Project</span></b></p>

<p class=MsoNormal style='line-height:normal'><b><span style='font-size:13.5pt;
font-family:"Times New Roman",serif'>Prerequisites:</span></b></p>

<ol start=1 type=1>
 <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>PHP 8.0 or higher</span></li>
 <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Composer</span></li>
 <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>MySQL (or your preferred database)</span></li>
 <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Laravel 10.x</span></li>
 <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>API Keys for:</span></li>
 <ul type=circle>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
      font-family:"Times New Roman",serif'>The Guardian API (</span><span
      style='font-size:10.0pt;font-family:"Courier New"'>GUARDIAN_API_KEY</span><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>)</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
      font-family:"Times New Roman",serif'>NewsAPI (</span><span
      style='font-size:10.0pt;font-family:"Courier New"'>NEWSAPI_API_KEY</span><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>)</span></li>
  <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
      font-family:"Times New Roman",serif'>New York Times API (</span><span
      style='font-size:10.0pt;font-family:"Courier New"'>NYTIMES_API_KEY</span><span
      style='font-size:12.0pt;font-family:"Times New Roman",serif'>)</span></li>
 </ul>
</ol>

<p class=MsoNormal style='line-height:normal'><b><span style='font-size:13.5pt;
font-family:"Times New Roman",serif'>Installation:</span></b></p>

<ol start=1 type=1>
 <li class=MsoNormal style='line-height:normal'><b><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Clone the repository</span></b><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'>:</span></li>
</ol>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><span
style='font-size:12.0pt;font-family:"Times New Roman",serif'>git clone https://github.com/mkazemiepoor/innoscripta.git</span></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><span
style='font-size:12.0pt;font-family:"Times New Roman",serif'>cd innoscripta</span></p>

<ol start=2 type=1>
 <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Install dependencies<b>:</b></span></li>
</ol>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><span
style='font-size:12.0pt;font-family:"Times New Roman",serif'>composer install</span></p>

<ol start=3 type=1>
 <li class=MsoNormal style='line-height:normal'><b><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Set up environment</span></b><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'>: Copy the .env.example
     to .env:</span></li>
</ol>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><span
style='font-size:12.0pt;font-family:"Times New Roman",serif'>cp .env.example
.env</span></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'>Add your API
keys to the <code><span style='font-size:10.0pt'>.env</span></code> file:</p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><span
style='font-size:12.0pt;font-family:"Times New Roman",serif'>GUARDIAN_API_KEY=your-guardian-api-key</span></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><span
style='font-size:12.0pt;font-family:"Times New Roman",serif'>NEWSAPI_API_KEY=your-newsapi-api-key</span></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><span
style='font-size:12.0pt;font-family:"Times New Roman",serif'>NYTIMES_API_KEY=your-nytimes-api-key</span></p>

<ol start=4 type=1>
 <li class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Generate the application key<b>:</b></span></li>
</ol>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><span
style='font-size:12.0pt;font-family:"Times New Roman",serif'>php artisan
key:generate</span></p>

<ol start=5 type=1>
 <li class=MsoNormal style='line-height:normal'><b><span style='font-size:12.0pt;
     font-family:"Times New Roman",serif'>Run the migrations</span></b><span
     style='font-size:12.0pt;font-family:"Times New Roman",serif'>:</span></li>
</ol>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>php artisan migrate</span></code></p>

<ol start=6 type=1>
 <li class=MsoNormal style='line-height:normal'><strong><span style='font-family:
     "Calibri",sans-serif'>Run the scheduled task</span></strong>:</li>
</ol>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>php artisan fetch:articles</span></code></p>

<ol start=7 type=1>
 <li class=MsoNormal style='line-height:normal'><strong><span style='font-family:
     "Calibri",sans-serif'>Start the local server:</span></strong></li>
</ol>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>php artisan serve</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'>Your
application should now be up and running on <code><span style='font-size:10.0pt'><a
href="http://localhost:8000">http://localhost:8000</a></span></code>.</p>

<h2>API Endpoints</h2>

<h3><code><span style='font-size:10.0pt'>GET /api/articles</span></code></h3>

<p>Fetches a list of articles with optional filters.</p>

<p><strong>Query Parameters</strong>:</p>

<ul type=disc>
 <li class=MsoNormal style='line-height:normal'><code><span style='font-size:
     10.0pt'>page</span></code>: The page number for pagination (default: 1)</li>
 <li class=MsoNormal style='line-height:normal'><code><span style='font-size:
     10.0pt'>per_page</span></code>: The number of articles per page (default:
     10)</li>
 <li class=MsoNormal style='line-height:normal'><code><span style='font-size:
     10.0pt'>category</span></code>: Filter by article category</li>
 <li class=MsoNormal style='line-height:normal'><code><span style='font-size:
     10.0pt'>author</span></code>: Filter by author</li>
 <li class=MsoNormal style='line-height:normal'><code><span style='font-size:
     10.0pt'>source</span></code>: Filter by source (e.g., <code><span
     style='font-size:10.0pt'>NewsAPI</span></code>, <code><span
     style='font-size:10.0pt'>The Guardian</span></code>, <code><span
     style='font-size:10.0pt'>New York Times</span></code>)</li>
 <li class=MsoNormal style='line-height:normal'><code><span style='font-size:
     10.0pt'>date_from</span></code>: Filter by start date (format: <code><span
     style='font-size:10.0pt'>YYYY-MM-DD</span></code>)</li>
 <li class=MsoNormal style='line-height:normal'><code><span style='font-size:
     10.0pt'>date_to</span></code>: Filter by end date (format: <code><span
     style='font-size:10.0pt'>YYYY-MM-DD</span></code>)</li>
</ul>

<p><strong>Example Request</strong>:</p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>GET
/api/articles?page=2&amp;per_page=5&amp;category=technology</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><strong><span
style='font-family:"Calibri",sans-serif'>Response</span></strong>:</p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>{</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>  &quot;data&quot;: [</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>    {</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>      &quot;id&quot;: 1,</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>      &quot;title&quot;: &quot;Article Title&quot;,</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>      &quot;author&quot;: &quot;Author Name&quot;,</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>      &quot;published_at&quot;:
&quot;2025-01-27T12:00:00&quot;,</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>      &quot;content&quot;: &quot;Article
content...&quot;,</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>      &quot;source&quot;: &quot;NewsAPI&quot;,</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>      &quot;category&quot;: &quot;Technology&quot;,</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>      ...</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>    }</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>  ]</span></code></p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>}</span></code></p>

<h2>GitHub Workflow</h2>

<ul type=disc>
 <li class=MsoNormal style='line-height:normal'><strong><span style='font-family:
     "Calibri",sans-serif'>Version Control</span></strong>: The project is
     hosted on GitHub for version control and collaboration. You can clone the
     repository or contribute through pull requests.</li>
 <li class=MsoNormal style='line-height:normal'><strong><span style='font-family:
     "Calibri",sans-serif'>Branching</span></strong>: The main branch is <code><span
     style='font-size:10.0pt'>main</span></code>, with feature branches being
     used for new developments.</li>
 <li class=MsoNormal style='line-height:normal'><strong><span style='font-family:
     "Calibri",sans-serif'>Commits</span></strong>: Ensure to write clear
     commit messages that explain the purpose of the changes.</li>
</ul>

<h2>Cron Jobs &amp; Scheduling</h2>

<p>In order to run the scheduled tasks for fetching articles, you need to set
up Laravel's task scheduler. In a production environment, you can add the
following to your server's crontab to run every minute:</p>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>0 * * * * </span></code><span class=hljs-builtin><span
style='font-size:10.0pt;font-family:"Courier New"'>cd</span></span><code><span
style='font-size:10.0pt'> /path-to-your-project &amp;&amp; php artisan
fetch:articles &gt;&gt; /dev/null 2&gt;&amp;1</span></code></p>

<h2>Contributing</h2>

<p>If you'd like to contribute to the project, feel free to fork the repository
and create a pull request. Here are some ways you can help:</p>

<ul type=disc>
 <li class=MsoNormal style='line-height:normal'>Report bugs</li>
 <li class=MsoNormal style='line-height:normal'>Suggest new features or
     improvements</li>
 <li class=MsoNormal style='line-height:normal'>Submit code changes</li>
</ul>

<p class=MsoNormal style='margin-left:36.0pt;line-height:normal'><code><span
style='font-size:10.0pt'>&nbsp;</span></code></p>
