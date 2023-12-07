import './bootstrap';

Echo.channel('post.created')
    .listen('PostCreated', (event) => {
        // Обработка события
        alert(`New post created: ${event.post.title}`);
    });
