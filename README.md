### Install Project

- Clone Repo to project folder
- Copy `config.php.sample` to `config.php`
- Open `config.php`
    - Fill configuration values
        - define( 'ADMIN_EMAIL', '' ); // Mails from the site will be sent to this address
        - define( 'CC_EMAIL', '' ); // Mails from the site will be sent to this address like copy
- Copy `gulpconfig.js.sample` to `gulpconfig.js`
- Open `gulpconfig.js`
- Change isDev property (optionally)
    - `true` (no compress + sourceMaps CSS & JS)
    - `false` (compress CSS & JS for production)
- `Open console`
- `Change Dir to project root dir`
- Run `npm install` (Install all js dependencies. Gulp etc.)
- Run `gulp default` or `gulp default watch` for watch project files (Build project files) 

After GULP finished your project is ready!
