const postform = document.getElementById('form');
const post_title = document.getElementById('post_title');
const title_error_mas = document.getElementById('post_title_error');

const feature_image = document.getElementById('feature_image');
const feature_image_error_mas = document.getElementById('feature_image_error');

postform.addEventListener('submit', (e) =>{
    if(post_title.value === '' || post_title.value == null){
        e.preventDefault();
        title_error_mas.innerHTML = "Enter your post title";
    }
    if(feature_image.value === '' || feature_image.value == null){
        e.preventDefault();
        feature_image_error_mas.innerHTML = "Select your featured image";
    }
    if( category_name.value === '' || category_name == null ){
        e.preventDefault();
        category_name_error_mas.innerHTML = "Enter your category name";
    }
});
const catform = document.getElementById('form');
const category_name = document.getElementById('cat_name');
const category_name_error_mas = document.getElementById('cat_name_error');

catform.addEventListener('submit', (e) =>{
      if( category_name.value === '' || category_name == null ){
        e.preventDefault();
        category_name_error_mas.innerHTML = "Enter your category name";
    }
});

const tagform = document.getElementById('form');
const tag_name = document.getElementById('tag_name');
const tag_name_error_mas = document.getElementById('tag_name_error');

tagform.addEventListener('submit', (e) =>{    
      if( tag_name.value === '' || tag_name == null ){
        e.preventDefault();
        tag_name_error_mas.innerHTML = "Enter your tag name";
    }
});