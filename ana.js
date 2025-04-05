(function() {
    const data = {
        userAgent: navigator.userAgent,
        location: window.location.href,
        pageViewed: document.title,
        dateTime: new Date().toISOString()
    };

    fetch('https://your-domain.com/nia.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .catch(() => {
        // Handle errors silently without logging to the console
    });
})();