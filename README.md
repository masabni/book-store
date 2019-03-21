# Products CRUD
#### Steps to reproduce:
1. Install this code on your local system:
     
    ```
    git clone https://github.com/masabni/book-store.git
    ```

2. Change directory into the local clone of the repository

    ```
    cd book-store
    ```

3. Installs the project dependencies

    ```
    composer install
    ```

4. Create a `.env` file by copying the sample

    ```
    cp .env.example .env
    ```
    
    Or for Windows:
    
    ```
    copy .env.example .env
    ```
    
    Now edit the *.env* file and change the DB variables
    
5. Run migrations & seeders:

    ```
    php artisan migrate --seed
    ```
    
6. Create link to the storage dir:

    ```
    php artisan storage:link
    ```
    
7. Start project

    ```
    php artisan serve
    ```
    
This wiil run the app on [http://127.0.0.1:8000](http://127.0.0.1:8000)
