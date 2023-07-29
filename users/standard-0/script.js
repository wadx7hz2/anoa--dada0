// Sample image data for the gallery (include tags)
const imageData = [
  { url: "images/APapaordogizoje.jpg", tags: ['ACTION'], associatedUrl: 'index.html', title: 'A Pápa Ördögűzője', },
  { url: "images/BaratnotFelveszunk.jpg", tags: ['ADVENTURE'], associatedUrl: 'index.html', title: 'Barátnőt Felveszünk', },
  { url: "images/GonoszHalottAzEbredes.jpg", tags: ['HORROR'], associatedUrl: 'index.html', title: 'Gonosz halott: Az ébredés', },
  { url: "images/Rohammento.jpg", tags: ['FANTASY'], associatedUrl: 'index.html', title: 'Rohammentő', },
  { url: "images/Kovetes.jpg", tags: ['THRILLER'], associatedUrl: 'index.html', title: 'Követés', },
  { url: "images/Mumiak.jpg", tags: ['THRILLER'], associatedUrl: 'index.html', title: 'Múmiák', },
];

// Function to create gallery items and append them to the gallery container
function createGalleryItem(imageData) {
  const galleryItem = document.createElement('div');
  galleryItem.classList.add('col-md-4', 'gallery-item');
  galleryItem.dataset.tags = imageData.tags.join(' ');

  const image = document.createElement('img');
  image.src = imageData.url;
  image.alt = 'Movie Poster'; // Add the alt attribute

  const playButton = document.createElement('button');
  playButton.classList.add('btn', 'btn-primary', 'play-button');
  playButton.textContent = 'Lejátszás';

  // Add click event listener to the "Lejátszás" button
  playButton.addEventListener('click', function () {
    // Redirect to the associated URL when the button is clicked
    window.location.href = imageData.associatedUrl;
  });

  const title = document.createElement('h4');
  title.textContent = imageData.title; // Set the title under the image

  const tags = document.createElement('p');
  tags.textContent = imageData.tags.join(', ');

  galleryItem.appendChild(image);
  galleryItem.appendChild(title); // Append the title
  galleryItem.appendChild(playButton);
  galleryItem.appendChild(tags);
  document.getElementById('gallery').appendChild(galleryItem);
}

// Load the gallery when the page is ready
document.addEventListener('DOMContentLoaded', function () {
  for (const data of imageData) {
    createGalleryItem(data);
  }
});

// Filter images based on selected tags or search query
function filterImages() {
  const searchInput = document.getElementById('searchInput').value.toLowerCase();
  const galleryItems = document.querySelectorAll('.gallery-item');

  galleryItems.forEach((item) => {
    const tags = item.dataset.tags.toLowerCase();
    const imageUrl = item.querySelector('img').src.toLowerCase();

    if (tags.includes(searchInput) || imageUrl.includes(searchInput)) {
      item.style.display = 'block';
    } else {
      item.style.display = 'none';
    }
  });
}

// Handle menu click events
const menuItems = document.querySelectorAll('.nav-link');
menuItems.forEach((item) => {
  item.addEventListener('click', function (event) {
    event.preventDefault();
    const filter = this.getAttribute('data-filter');
    filterImagesByTag(filter);
    this.classList.add('active');
    // Remove 'active' class from other menu items
    menuItems.forEach((menuItem) => {
      if (menuItem !== this) {
        menuItem.classList.remove('active');
      }
    });
  });
});

// Filter images based on clicked menu item
function filterImagesByTag(tag) {
  const galleryItems = document.querySelectorAll('.gallery-item');

  galleryItems.forEach((item) => {
    if (tag === 'all' || item.dataset.tags.includes(tag)) {
      item.style.display = 'block';
    } else {
      item.style.display = 'none';
    }
  });
}