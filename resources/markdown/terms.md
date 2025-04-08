# Guia del projecte i sprints

## Resum del projecte

El projecte consisteix en desenvolupar una aplicació semblant a YouTube, on els usuaris poden pujar vídeos amb metadades
com el títol, la descripció i l'URL.

## Sprint 1

1. **Gestió d'usuaris**:
    - Implementació de la funcionalitat per crear usuaris amb les seves funcions associades.

2. **Creació del Test de Helpers**:
    - Creació d'un test per verificar que es poden crear:
        - L'usuari per defecte.
        - El professor per defecte.
    - Els camps han de ser `name`, `email` i `password`, on la contrasenya es xifra.
    - Els usuaris es vinculen a un `team`.

3. **Helpers**:
    - Creació de helpers a la carpeta `app`.

4. **Configuració de credencials**:
    - Configuració de les credencials dels usuaris a `config` perquè utilitzin el fitxer `.env` de manera
      predeterminada.

## Sprint 2

1. **Correcció d'errors**:
    - Solucionats els errors detectats en el primer sprint.

2. **Configuració de PHPUnit**:
    - Modificació del fitxer PHPUnit per utilitzar una base de dades temporal durant els tests, evitant afectar la base
      de dades real.

3. **Migració de vídeos**:
    - Creació de la migració amb els camps: `id`, `title`, `description`, `url`, `published_at`, `previous`, `next`,
      `series_id`.
    - Ús de URLs de vídeos de YouTube per als inserts de mostra.

4. **Controlador de vídeos**:
    - Desenvolupament del `VideosController` amb funcions per provar i mostrar vídeos.

5. **Model de vídeos**:
    - Creació del model de vídeos, configurant el camp `published_at` com a data.
    - Implementació de mètodes per formatar les dates amb la llibreria Carbon:
        - `getFormattedPublishedAtAttribute`: retorna una data tipus "13 de gener de 2025".
        - `getFormattedForHumansPublishedAtAttribute`: retorna una data tipus "fa 2 hores".
        - `getPublishedAtTimestampAttribute`: retorna el valor Unix timestamp.

6. **Helper de vídeos per defecte**:
    - Creació d'un helper per gestionar vídeos per defecte.

7. **Seeder de base de dades**:
    - Afegits usuaris i vídeos per defecte al `DatabaseSeeder`.

8. **Disseny del layout**:
    - Creació d'un layout anomenat `VideosAppLayout` a les carpetes `app/View/components` i `resources/views/layouts`.

9. **Ruta i vista del show de vídeos**:
    - Configuració de la ruta per mostrar vídeos i creació de la vista corresponent.

10. **Tests unitaris i funcionals**:
    - **Tests unitaris**:
        - `HelpersTest`: verificació de funcions auxiliars i de la creació de vídeos per defecte.
        - `VideosTest` (carpeta `tests/Unit`): comprova la formatació de dates, incloent:
            - `can_get_formatted_published_at_date()`.
            - `can_get_formatted_published_at_date_when_not_published()`.
    - **Tests funcionals**:
        - `VideosTest` (carpeta `tests/Feature/Videos`): valida:
            - `users_can_view_videos()`.
            - `users_cannot_view_not_existing_videos()`.

## Sprint 3

1. **Corregir errors del 2n Sprint**:
    - Solucionats els errors detectats durant el segon sprint per garantir el correcte funcionament del sistema.

2. **Instal·lació de `spatie/laravel-permission`**:
    - Instal·lació del paquet `spatie/laravel-permission` per gestionar rols i permisos dels usuaris.
    - Seguir la documentació oficial per a la seva
      instal·lació: [spatie/laravel-permission](https://spatie.be/docs/laravel-permission/v6/installation-laravel).

3. **Migració per afegir el camp `super_admin`**:
    - Creació d'una migració per afegir un nou camp `super_admin` a la taula d'usuaris per identificar als
      superadministradors.

4. **Model d'usuaris**:
    - Afegida la funció `testedBy()` i `isSuperAdmin()` al model d'usuari per facilitar la verificació de si un usuari
      és un superadministrador.

5. **Funció `create_default_professor` i gestió de rols**:
    - Afegit el superadmin al professor a la funció `create_default_professor` de helpers.
    - Creació de la funció `add_personal_team()` per separar la creació del `team` dels usuaris.
    - Creació de les funcions `create_regular_user()`, `create_video_manager_user()` i `create_superadmin_user()` per
      generar usuaris amb rols específics i credencials per defecte:
        - **create_regular_user()**: (regular, regular@videosapp.com, 123456789).
        - **create_video_manager_user()**: (Video Manager, videosmanager@videosapp.com, 123456789).
        - **create_superadmin_user()**: (Super Admin, superadmin@videosapp.com, 123456789).
    - Creació de les funcions `define_gates()` i `create_permissions()` per definir permisos i portes d'accés.

6. **Registre de polítiques d'autorització i definició de portes d'accés**:
    - A la funció `book` d'`app/Providers/AppServiceProvider`, es registren les polítiques d'autorització i es
      defineixen les portes d'accés per gestionar els permisos de l'aplicació.

7. **Seeder d'usuaris i permisos per defecte**:
    - Afegits els usuaris per defecte amb els rols de superadmin, usuari regular i video manager al `DatabaseSeeder`.

8. **Publicació de stubs**:
    - Publicació dels stubs per personalitzar els fitxers de l'aplicació, seguint l'exemple de
      la [documentació de Laravel](https://laravel-news.com/customizing-stubs-in-laravel).

9. **Creació del test `VideosManageControllerTest`**:
    - Creació del test per validar la gestió de vídeos:
        - **`user_with_permissions_can_manage_videos()`**: Verifica que els usuaris amb permisos poden gestionar vídeos.
        - **`regular_users_cannot_manage_videos()`**: Verifica que els usuaris regulars no poden gestionar vídeos.
        - **`guest_users_cannot_manage_videos()`**: Verifica que els usuaris convidats no poden gestionar vídeos.
        - **`superadmins_can_manage_videos()`**: Verifica que els superadministradors poden gestionar vídeos.
        - Funcions de login per a cada tipus d'usuari: `loginAsVideoManager()`, `loginAsSuperAdmin()`,
          `loginAsRegularUser()`.

10. **Creació del test `UserTest`**:
    - Creació del test per validar la funció `isSuperAdmin()` i comprovar si un usuari és un superadministrador.

11. **Documentació dels termes**:
    - Afegit a `resources/markdown/terms` el que s'ha fet en aquest sprint per mantenir la documentació actualitzada.

12. **Comprovació amb Larastan**:
    - Comprovats tots els fitxers creats durant aquest sprint amb Larastan per garantir la qualitat del codi i detectar
      possibles errors de tipus.

## Sprint 4

1. **Corregir errors del 3r sprint**:
    - Revisar i corregir els errors relacionats amb l'accés a la ruta `/videosmanage` en funció dels permisos dels
      usuaris. Si no s'ha comprovat als testos, modificar-ho per garantir que només els usuaris amb els permisos
      adequats poden accedir.

2. **Crear `VideosManageController`**:
    - Implementar les funcions següents en el controlador `VideosManageController`:
        - `testedby`
        - `index`
        - `store`
        - `show`
        - `edit`
        - `update`
        - `delete`
        - `destroy`

3. **Crear funció `index` a `VideosController`**:
    - Crear la funció `index` per a mostrar tots els vídeos.

4. **Revisar vídeos creats a helpers**:
    - Comprovar que tinguem 3 vídeos creats a `helpers` i que estiguin afegits al `databaseSeeder`.

5. **Crear vistes per al CRUD de vídeos**:
    - Crear les vistes per al CRUD de vídeos que només poden veure els usuaris amb els permisos adequats:
        - `resources/views/videos/manage/index.blade.php`
        - `resources/views/videos/manage/create.blade.php`
        - `resources/views/videos/manage/edit.blade.php`
        - `resources/views/videos/manage/delete.blade.php`

6. **Afegir taula de CRUD a `index.blade.php`**:
    - Afegir una taula amb la llista dels vídeos al fitxer `index.blade.php`.

7. **Afegir formulari de creació a `create.blade.php`**:
    - Afegir un formulari per a la creació de vídeos al fitxer `create.blade.php`. Utilitzar l'atribut `data-qa` per
      facilitar la identificació en els tests.

8. **Afegir taula de CRUD a `edit.blade.php`**:
    - Afegir la taula del CRUD de vídeos a `edit.blade.php`.

9. **Afegir confirmació a `delete.blade.php`**:
    - Afegir una confirmació d'eliminació del vídeo a `delete.blade.php`.

10. **Crear vista `index.blade.php` de vídeos**:
    - Crear la vista `resources/views/videos/index.blade.php` per mostrar tots els vídeos, similar a la pàgina principal
      de YouTube. En clicar sobre un vídeo, es redirigirà al detall del vídeo (funció `show` del sprint anterior).

11. **Modificar test `user_with_permissions_can_manage_videos()`**:
    - Modificar el test `user_with_permissions_can_manage_videos()` per garantir que hi hagi 3 vídeos creats.

12. **Crear permisos per a vídeos al `helpers`**:
    - Crear els permisos per al CRUD de vídeos a `helpers` i assignar-los als usuaris corresponents.

13. **Crear tests a `VideoTest`**:
    - Crear les següents funcions a `VideoTest`:
        - `user_without_permissions_can_see_default_videos_page`
        - `user_with_permissions_can_see_default_videos_page`
        - `not_logged_users_can_see_default_videos_page`

14. **Crear tests a `VideosManageControllerTest`**:
    - Crear les següents funcions a `VideosManageControllerTest`:
        - `loginAsVideoManager`
        - `loginAsSuperAdmin`
        - `loginAsRegularUser`
        - `user_with_permissions_can_see_add_videos`
        - `user_without_videos_manage_create_cannot_see_add_videos`
        - `user_with_permissions_can_store_videos`
        - `user_without_permissions_cannot_store_videos`
        - `user_with_permissions_can_destroy_videos`
        - `user_without_permissions_cannot_destroy_videos`
        - `user_with_permissions_can_see_edit_videos`
        - `user_without_permissions_cannot_see_edit_videos`
        - `user_with_permissions_can_update_videos`
        - `user_without_permissions_cannot_update_videos`
        - `user_with_permissions_can_manage_videos`
        - `regular_users_cannot_manage_videos`
        - `guest_users_cannot_manage_videos`
        - `superadmins_can_manage_videos`

15. **Crear rutes per al CRUD de vídeos**:
    - Crear les rutes de `videos/manage` per al CRUD de vídeos amb el middleware corresponent.
    - La ruta `index` de vídeos serà accessible tant si l'usuari està logejat com si no, mentre que les rutes del CRUD
      seran accessibles només quan l'usuari estigui logejat.

16. **Afegir navbar i footer a la plantilla**:
    - Afegir una barra de navegació i un peu de pàgina a la plantilla `resources/layouts/videosapp` per permetre la
      navegació entre les pàgines.

17. **Afegir contingut a `resources/markdown/terms`**:
    - Afegir a `resources/markdown/terms` la informació treballada en aquest sprint.

18. **Comprovar amb Larastan**:
    - Comprovar tots els fitxers creats amb Larastan per garantir que el codi és correcte i no hi ha errors.

## Sprint 5

1. **Corregir errors del 4t Sprint**:
    - Revisar i corregir els errors detectats durant el quart sprint per garantir que tot funcioni correctament.

2. **Afegir el camp `user_id` a la taula de vídeos**:
    - Modificar la taula de vídeos per incloure un camp `user_id`, que emmagatzemarà l'usuari que ha afegit el vídeo.
    - Modificar el controlador, el model i els helpers per gestionar aquesta nova columna.

3. **Solucionar errors dels tests**:
    - Si algun test dels sprints anteriors falla a causa de les modificacions, s'haurà de revisar i corregir els errors
      per garantir que els tests passin correctament.

4. **Crear `UsersManageController`**:
    - Implementar les següents funcions en el controlador `UsersManageController`:
        - `testedBy`
        - `index`
        - `store`
        - `edit`
        - `update`
        - `delete`
        - `destroy`

5. **Crear funció `index` i `show` a `UsersController`**:
    - Crear la funció `index` per mostrar tots els usuaris.
    - Crear la funció `show` per veure els detalls d'un usuari concret.

6. **Crear vistes per al CRUD d'usuaris**:
    - Crear les vistes per al CRUD d'usuaris que només podran veure els usuaris amb permisos adequats:
        - `resources/views/users/manage/index.blade.php`
        - `resources/views/users/manage/create.blade.php`
        - `resources/views/users/manage/edit.blade.php`
        - `resources/views/users/manage/delete.blade.php`

7. **Afegir taula de CRUD d'usuaris a `index.blade.php`**:
    - Afegir una taula amb la llista dels usuaris al fitxer `index.blade.php`.

8. **Afegir formulari de creació a `create.blade.php`**:
    - Afegir un formulari per a la creació d'usuaris al fitxer `create.blade.php`, utilitzant l'atribut `data-qa` per
      facilitar la identificació en els tests.

9. **Afegir taula de CRUD d'usuaris a `edit.blade.php`**:
    - Afegir la taula del CRUD d'usuaris a `edit.blade.php`.

10. **Afegir confirmació a `delete.blade.php`**:
    - Afegir una confirmació d'eliminació d'un usuari a `delete.blade.php`.

11. **Crear vista `index.blade.php` per mostrar tots els usuaris**:
    - Crear la vista `resources/views/users/index.blade.php` per mostrar tots els usuaris, amb una funcionalitat de
      cerca.
    - En clicar sobre un usuari, es redirigirà a la pàgina de detalls de l'usuari.

12. **Crear permisos per al CRUD d'usuaris**:
    - Crear els permisos per al CRUD d'usuaris a `helpers` i assignar-los als usuaris corresponents.

13. **Crear tests per a la gestió d'usuaris**:
    - Crear els següents tests per verificar el funcionament del CRUD d'usuaris:
        - `user_with_permissions_can_manage_users()`
        - `regular_users_cannot_manage_users()`
        - `guest_users_cannot_manage_users()`
        - `superadmins_can_manage_users()`
        - `user_without_permissions_can_see_users_list()`
        - `user_with_permissions_can_see_users_list()`

14. **Crear rutes per al CRUD d'usuaris**:
    - Crear les rutes de `users/manage` per al CRUD d'usuaris amb el middleware corresponent.
    - La ruta `index` d'usuaris serà accessible tant si l'usuari està logejat com si no, mentre que les rutes del CRUD
      seran accessibles només quan l'usuari estigui logejat.

15. **Afegir navbar i footer a la plantilla**:
    - Afegir una barra de navegació i un peu de pàgina a la plantilla `resources/layouts/videosapp` per permetre la
      navegació entre les pàgines.

16. **Afegir contingut a `resources/markdown/terms`**:
    - Afegir a `resources/markdown/terms` la informació treballada en aquest sprint.

17. **Comprovar amb Larastan**:
    - Comprovar tots els fitxers creats amb Larastan per garantir que el codi és correcte i no hi ha errors.

## 6è Sprint

1. **Corregir errors del 5è Sprint**

- Es van revisar i corregir els errors detectats durant el 5è Sprint per garantir el bon funcionament de l'aplicació.

2. **Modificar el codi per corregir fallades en els tests**

- Es van revisar i corregir els tests que van fallar a causa de les modificacions realitzades durant aquest Sprint i els
  anteriors.

3. **Modificar vídeos per assignar-los a sèries**

- Es va afegir la capacitat d'assignar un vídeo a una sèrie, modificant el model de vídeos i afegint la relació 1:N amb
  el model de sèrie.

4. **Permetre als usuaris regulars crear vídeos**

- A `VideoController` es van afegir les funcions del CRUD per als usuaris regulars, i es van crear els botons
  corresponents a la vista de vídeos per permetre aquesta funcionalitat.

5. **Crear la migració de les sèries**

- Es va crear la migració per a la taula de **sèries**, amb els següents camps:
    - `id`
    - `title`
    - `description`
    - `image` (nullable)
    - `user_name`
    - `user_photo_url` (nullable)
    - `published_at` (nullable)

6. **Crear el model de sèries**

- El model de **sèries** va incloure les funcions següents:
    - `testedBy()`
    - `videos()`: per la relació 1:N amb els vídeos.
    - `getFormattedCreatedAtAttribute()`
    - `getFormattedForHumansCreatedAtAttribute()`
    - `getCreatedAtTimestampAttribute()`

7. **Afegir relació entre vídeos i sèries**

- Al model de **vídeos** es va afegir la relació 1:N amb el model de **sèries** per associar cada vídeo amb una sèrie
  específica.

8. **Crear **SeriesManageController****

- Es va crear el controlador **SeriesManageController** amb les següents funcions:
    - `testedBy()`
    - `index()`
    - `store()`
    - `edit()`
    - `update()`
    - `delete()`
    - `destroy()`

9. **Crear **SeriesController****

- Es va crear el controlador **SeriesController** amb les funcions:
    - `index()`: per mostrar totes les sèries.
    - `show()`: per mostrar els detalls d'una sèrie específica.

10. **Crear la funció `create_series()` a helpers**

- A la funció `create_series()` de helpers es van afegir 3 sèries per defecte.

11. **Crear les vistes per al CRUD de sèries**

- Es van crear les vistes del CRUD de sèries en les següents rutes:
    - `resources/views/series/manage/index.blade.php`
    - `resources/views/series/manage/create.blade.php`
    - `resources/views/series/manage/edit.blade.php`
    - `resources/views/series/manage/delete.blade.php`

12. **Afegir taula de CRUD a `index.blade.php`**

- Es va afegir una taula amb la llista de sèries a la vista **index.blade.php** per mostrar totes les sèries
  disponibles.

13. **Afegir formulari a `create.blade.php`**

- Es va afegir un formulari per crear sèries a la vista **create.blade.php**, amb l'atribut `data-qa` per facilitar la
  identificació durant els tests.

14. **Afegir taula a `edit.blade.php`**

- Es va afegir la taula del CRUD de sèries a la vista **edit.blade.php** per permetre l'edició de les sèries existents.

15. **Afegir confirmació a `delete.blade.php`**

- A la vista **delete.blade.php** es va afegir la confirmació d'eliminació d'una sèrie i dels vídeos associats a aquesta
  sèrie. En cas que no es vulguin eliminar els vídeos, la relació es desassigna.

16. **Crear vista `index.blade.php` per mostrar totes les sèries**

- Es va crear la vista **index.blade.php** per mostrar totes les sèries disponibles amb una funcionalitat de cerca. Al
  fer clic sobre una sèrie, es mostren els vídeos associats.

17. **Crear permisos per al CRUD de sèries**

- Es van crear els permisos per al CRUD de sèries a helpers i es van assignar als usuaris amb el rol de **superadmin**.

18. **Crear test `SerieTest`**

- A `test/Unit/SerieTest`, es va crear la funció `serie_have_videos()` per verificar que una sèrie tingui vídeos
  associats correctament.

19. **Crear test `SeriesManageControllerTest`**

- A **SeriesManageControllerTest**, es van crear les següents funcions:
    - `loginAsVideoManager()`
    - `loginAsSuperAdmin()`
    - `loginAsRegularUser()`
    - `user_with_permissions_can_see_add_series()`
    - `user_without_series_manage_create_cannot_see_add_series()`
    - `user_with_permissions_can_store_series()`
    - `user_without_permissions_cannot_store_series()`
    - `user_with_permissions_can_destroy_series()`
    - `user_without_permissions_cannot_destroy_series()`
    - `user_with_permissions_can_see_edit_series()`
    - `user_without_permissions_cannot_see_edit_series()`
    - `user_with_permissions_can_update_series()`
    - `user_without_permissions_cannot_update_series()`
    - `user_with_permissions_can_manage_series()`
    - `regular_users_cannot_manage_series()`
    - `guest_users_cannot_manage_series()`
    - `videomanagers_can_manage_series()`
    - `superadmins_can_manage_series()`

20. **Crear rutes per al CRUD de sèries**

- Es van crear les rutes de **series/manage** per al CRUD de sèries amb el middleware corresponent. Les rutes de l'índex
  i el **show** només són accessibles quan l'usuari està logejat.

21. **Navegació entre pàgines**

- Es va afegir funcionalitat de navegació entre pàgines perquè l'usuari pugui passar entre la llista de vídeos, sèries i
  altres vistes relacionades.

22. **Afegir contingut a `resources/markdown/terms`**

- Es va afegir informació detallada sobre les tasques realitzades durant aquest Sprint a `resources/markdown/terms` per
  mantenir la documentació actualitzada.

23.**Comprovar amb Larastan**

- Tots els fitxers creats durant aquest Sprint es van comprovar amb **Larastan** per garantir la qualitat del codi i
  detectar possibles errors de tipus.

---


Aquest document resumeix el projecte i les tasques realitzades en els 6 primers sprints.
