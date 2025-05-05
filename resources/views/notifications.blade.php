<x-videos-app-layout>
    <h1>Notificaciones Push</h1>

    <!-- Aquí se mostrarán las notificaciones -->
    <div id="notifications" style="margin-top: 20px;"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('DOM cargado');

            if (window.Echo) {
                console.log('Echo cargado');

                // Escuchar el evento 'video.created'
                window.Echo.channel('videos')
                    .listen('video.created', (event) => {
                        console.log('Event recibido:', event);

                        // Crear un nuevo div para la notificación
                        const notification = document.createElement('div');
                        notification.classList.add('notification');

                        // Crear el contenido de la notificación
                        const notificationContent = `
                            <strong>Nuevo Video</strong><br>
                            Título: ${event.title}<br>
                            Fecha de creación: ${new Date(event.created_at).toLocaleString()}
                        `;
                        notification.innerHTML = notificationContent;

                        // Añadir la notificación al contenedor
                        document.getElementById('notifications').appendChild(notification);
                    });
            } else {
                console.error('Echo no está disponible!');
            }
        });
    </script>

</x-videos-app-layout>
