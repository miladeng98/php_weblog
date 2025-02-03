function deleteAllCookies() {
    // Get all cookies
    const cookies = document.cookie.split(";");

    // Loop through the cookies and delete each one
    for (let cookie of cookies) {
        // Get the cookie name
        const cookieName = cookie.split("=")[0].trim();
        
        // Set the cookie with an expiration date in the past
        document.cookie = `${cookieName}=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/;`;
    }
}

function redirect($dst) {
    window.location.href = $dst;
}
