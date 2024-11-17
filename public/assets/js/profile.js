function submitReview() {
    // Ambil nilai input
    const username = document.getElementById("username").value;
    const reviewText = document.getElementById("reviewText").value;
    const rating = document.getElementById("rating").value;
    const profileImageInput = document.getElementById("profileImage");

    // Validasi input
    if (!username || !reviewText || !rating) {
        alert("Mohon lengkapi semua field ulasan.");
        return;
    }

    // Mengambil gambar profil atau menggunakan avatar default
    const reader = new FileReader();
    reader.onload = function(event) {
        const profileImageSrc = event.target.result || "default-avatar.png";

        // Buat elemen ulasan baru
        const reviewContainer = document.createElement("div");
        reviewContainer.classList.add("review");

        const profileImage = document.createElement("img");
        profileImage.src = profileImageSrc;
        profileImage.alt = "User Image";
        profileImage.classList.add("user-image");

        const userInfo = document.createElement("div");

        const userElement = document.createElement("h3");
        userElement.textContent = username;

        const ratingElement = document.createElement("div");
        ratingElement.classList.add("rating");
        ratingElement.textContent = rating;

        const reviewTextElement = document.createElement("p");
        reviewTextElement.textContent = reviewText;

        // Tambahkan elemen ke dalam ulasan baru
        userInfo.appendChild(userElement);
        userInfo.appendChild(ratingElement);
        userInfo.appendChild(reviewTextElement);
        reviewContainer.appendChild(profileImage);
        reviewContainer.appendChild(userInfo);

        // Tambahkan ulasan baru ke bagian ulasan
        document.getElementById("reviewsSection").appendChild(reviewContainer);

        // Kosongkan input form
        document.getElementById("username").value = "";
        document.getElementById("reviewText").value = "";
        document.getElementById("rating").value = "";
        document.getElementById("profileImage").value = "";
    };

    // Membaca gambar profil yang diunggah
    if (profileImageInput.files[0]) {
        reader.readAsDataURL(profileImageInput.files[0]);
    } else {
        // Jika tidak ada gambar yang diunggah, gunakan gambar avatar default
        reader.onload({ target: { result: "default-avatar.png" } });
    }
}
