<p align="center">
    <a href="https://github.com/lahiruanushka/JobFinderApp-Demo" target="_blank">
        <img src="public/images/job-work-svgrepo-com.svg" width="100" alt="JobFinderApp Logo">
    </a>
</p>

# Job Posting App

Job Posting App is a straightforward job finding and posting application built with Laravel 11. Created for educational purposes and based on a YouTube tutorial, this app allows users to post job listings and search for job opportunities.

## Features

- Post new job listings with details such as title, company, location, tags, and description.
- Search for job listings using keywords.
- View details of individual job listings.
- Contact the employer directly through the provided email.
- Visit the company's website for more information.

## Installation

To set up the project locally, follow these steps:

1. **Clone the repository:**

    ```sh
    git clone https://github.com/lahiruanushka/laravel-job-posting-app.git
    cd laravel-job-posting-app
    ```

2. **Install dependencies:**

    ```sh
    composer install
    npm install
    ```

3. **Create a copy of the `.env` file:**

    ```sh
    cp .env.example .env
    ```

4. **Generate the application key:**

    ```sh
    php artisan key:generate
    ```

5. **Set up the database:**

    - Update the database credentials in the `.env` file.

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=jobfinder_db
    DB_USERNAME=root
    DB_PASSWORD=
    ```

    - Run the migrations:

    ```sh
    php artisan migrate
    ```

    - Seed the database with dummy data:

    ```sh
    php artisan db:seed
    ```

6. **Start the development server:**

    ```sh
    php artisan serve
    ```

7. **Open your browser and navigate to `http://127.0.0.1:8000` to see the application.**

## Usage

- **Posting a Job:** Navigate to the job posting form and fill in the required details to post a new job listing.
- **Searching for Jobs:** Use the search bar to find job listings that match your keywords.
- **Viewing Job Details:** Click on a job title to view more details about the job, contact the employer, or visit the company website.

## Contributing

Contributions are welcome! Please fork this repository and submit a pull request with your changes. For major changes, please open an issue to discuss what you would like to change.

## License

This project is open-source and available under the [MIT license](https://opensource.org/licenses/MIT).
