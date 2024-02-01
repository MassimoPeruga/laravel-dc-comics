# Template Laravel



### Come creare il template

1. Creo una cartella con il nome del progetto
2. La apro su vs code
3. Dal terminale di vs code lancio: 
```powershell
    composer create-project laravel/laravel .
```
4. Cancello il contenuto del file `welcome.blade.php` e creo una struttura `html:5`
5. Nello stesso file:
```html
    <!doctype html>
    <head>
        {{-- ... --}}
    
        @vite(['resources/js/app.js'])
    </head>
```
6. Apro una nuova finestra del terminale e lancio:
    ```powershell 
        npm install
    ```

    ```powershell 
        npm i --save-dev sass
    ```

    ```powershell 
        npm i --save bootstrap @popperjs/core
    ```
7. Rinomino la cartella `css` in `scss` e il file `app.css` al suo interno in `app.scss`
8. Modifico il file `vite.config.js`:
```js
    import { defineConfig } from 'vite';
    import laravel from 'laravel-vite-plugin';
    import path from 'path';

    export default defineConfig({
        plugins: [
            laravel({
                input: ['resources/scss/app.scss', 'resources/js/app.js'],
                refresh: true,
            }),
        ],
        resolve: {
            alias: {
                '~resources': '/resources/',
                '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            }
        },
    });
```
9. Nel file `app.js` aggiungo: 
```js
    import '~resources/scss/app.scss';
    import * as bootstrap from 'bootstrap';
    import.meta.glob(['../img/**/']);
```
10. Nel file `app.scss` aggiungo: 
```scss
    @import '~bootstrap/scss/bootstrap';
```
11. Pubblico la cartella come repo su GitHub e in Settings la imposto come template



### Come usare il template

1. Creo una nuova repo su GitHub e scelgo di usare questo template
2. Entro nella repo appena creata, clicco su `Code` e copio il link `HTTPS`
3. Creo una nuova cartella nella quale andrò a scaricare la cartella della repo e la apro su vs code
4. Apro il terminale e lancio `git clone LinkCopiato`
5. Da vs code chiudo la cartella contenente la repo e apro la cartella corretta
6. Apro il terminale da vs code e lancio:
    ```powershell 
        composer install
    ```
    ```powershell 
        Copy-Item -Path .env-exemple -Destination .env
    ```

    ```powershell 
        php artisan serve
    ```
7. Apro il link del server php e genero una nuova `APP KEY`
8. Apro una nuova finestra del terminale e lancio:
    ```powershell 
        npm install
    ```

    ```powershell 
        npm run dev
    ```



### NB

- Per inserire delle immagini in un file 
    - `.blade.php` => 
    ```php
        <img src="{{ Vite::assets('resources/img/nomeimmagine.esempio')}}"
    ``` 
    - `.scss` => 
    ```scss
        background-image: url ('../img/immaginesfondo.esempio')
    ```