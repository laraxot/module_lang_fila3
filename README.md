# Module Lang
Modulo dedicato alla gestione delle traduzioni

## Aggiungere Modulo nella base del progetto
Dentro la cartella laravel/Modules

```bash
git submodule add https://github.com/laraxot/module_lang_fila3.git Lang
```

## Verificare che il modulo sia attivo
```bash
php artisan module:list
```
in caso abilitarlo
```bash
php artisan module:enable Lang
```

## Eseguire le migrazioni
```bash
php artisan module:migrate Lang
```