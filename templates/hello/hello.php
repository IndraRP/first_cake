<div class="hero-container">
    <div class="hero-text">
        <h1 style="color:chocolate;">Hello Broo</h1>
        <h2>This is First Cake Project</h2>
    </div>

    <img
        src="https://i.pinimg.com/474x/be/d3/05/bed30557eb41c6a98ec481e70a048cab.jpg"
        alt=""
        class="hero-image" />
</div>

<style>
    .hero-container {
        display: block;
        margin-top: 0.25rem;
    }

    @media (min-width: 768px) {
        .hero-container {
            display: flex;
        }
    }

    .hero-image {
        object-fit: cover;
        border-radius: 0.375rem;
        height: 350px;
        width: 350px;
        /* margin-left: 1.25rem; */
        margin-top: 1.75rem;
    }

    @media (min-width: 1024px) {
        .hero-container {
            justify-content: space-between;
            align-items: center;
        }

        .hero-image {
            height: 600px;
            width: 600px;
            margin-left: 0;
            margin-top: 0;
        }
    }
</style>