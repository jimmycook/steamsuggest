<template>
<div class="container">
    <div class="card">
        <div class="card-block">
            <h1>The player {{ params.username }} wasn't found</h1>
            <a v-link="{ path: '/' }">Click here to continue</a>
        </div>
    </div>
</div>
</template>

<script>
export default {
    ready () {

    }
}

</script>
