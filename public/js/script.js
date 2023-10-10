const input_left = document.getElementById("input_left");
const input_right = document.getElementById("input_right");

const thumb_left = document.querySelector(".slider > .thumb.left");
const thumb_right = document.querySelector(".slider > .thumb.right");
const range = document.querySelector(".slider > .range");

// Dapatkan nilai terendah dan tertinggi dari slider harga
const [minPrice, maxPrice] = [parseInt(input_left.min), parseInt(input_left.max)];

// Atur nilai awal untuk input_left dan input_right
// input_left.value = minPrice;
// input_right.value = maxPrice;

// Fungsi untuk mengatur nilai awal slider kiri
const set_left_value = () => {
    const _this = input_left;
    const percent = ((_this.value - minPrice) / (maxPrice - minPrice)) * 100;
    console.log(percent);
    thumb_left.style.left = percent + "%";
    range.style.left = percent + "%";
};

// Fungsi untuk mengatur nilai awal slider kanan
const set_right_value = () => {
    const _this = input_right;
    const percent = ((_this.value - minPrice) / (maxPrice - minPrice)) * 100;
    console.log(percent);
    thumb_right.style.right = 100 - percent + "%";
    range.style.right = 100 - percent + "%";
};


// Panggil fungsi set_left_value() dan set_right_value() untuk mengatur posisi awal
set_left_value();
set_right_value();

input_left.addEventListener("input", set_left_value);
input_right.addEventListener("input", set_right_value);

function left_slider(value) {
    const formattedValue = parseInt(value).toLocaleString("id-ID");
    document.getElementById('left_value').innerHTML = "Rp " + formattedValue;
}

function right_slider(value) {
    const formattedValue = parseInt(value).toLocaleString("id-ID");
    document.getElementById('right_value').innerHTML = "Rp " + formattedValue;
}
