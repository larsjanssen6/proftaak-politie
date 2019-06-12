<template>
    <div class="absolute pin-t pin-r m-2 z-50 cursor-pointer" @click="$modal.hide(name)">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="47.936" height="48.387" viewBox="0 0 47.936 48.387"><g id="Group_7660" data-name="Group 7660" transform="translate(-209.509 -441.623)"><path id="Path_23259" data-name="Path 23259" d="M2536.607,439.579s5.992,3.158,2.823,6.858-7.5.2-8.3-2.8c0,0-5.136,2.434-7.2-1.44-1.683-3.162,2.167-6.966,7.085-4.9l10-21.375s-4.2-2.258-2.554-5.834,6.387-3.329,7.413,1.975c0,0,5.746-1.99,6.854,2.267,1.091,4.262-4.542,5.706-6.592,4.182Z" transform="translate(1503.646 -1772.965) rotate(110)" fill="#009e97"/><path id="Path_23261" data-name="Path 23261" d="M2536.607,439.579s5.992,3.158,2.823,6.858-7.5.2-8.3-2.8c0,0-5.136,2.434-7.2-1.44-1.683-3.162,2.167-6.966,7.085-4.9l10-21.375s-4.2-2.258-2.554-5.834,6.387-3.329,7.413,1.975c0,0,5.746-1.99,6.854,2.267,1.091,4.262-4.542,5.706-6.592,4.182Z" transform="translate(2426.567 1813.344) rotate(-158)" fill="#009e97"/></g></svg>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['name']
    }
</script>