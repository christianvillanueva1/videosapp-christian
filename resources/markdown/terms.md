# Guia del projecte i sprints

## Resum del projecte
El projecte consisteix en desenvolupar una aplicació semblant a YouTube, on els usuaris poden pujar vídeos amb metadades com el títol, la descripció i l'URL.

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
    - Configuració de les credencials dels usuaris a `config` perquè utilitzin el fitxer `.env` de manera predeterminada.

## Sprint 2
1. **Correcció d'errors**:
    - Solucionats els errors detectats en el primer sprint.

2. **Configuració de PHPUnit**:
    - Modificació del fitxer PHPUnit per utilitzar una base de dades temporal durant els tests, evitant afectar la base de dades real.

3. **Migració de vídeos**:
    - Creació de la migració amb els camps: `id`, `title`, `description`, `url`, `published_at`, `previous`, `next`, `series_id`.
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

Aquest document resumeix el projecte i les tasques realitzades en els dos primers sprints.
