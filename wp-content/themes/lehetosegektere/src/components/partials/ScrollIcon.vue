<template>
  <div class="c-scroll-icon"></div>
</template>

<style lang="scss" scoped>
  .c-scroll-icon {
    position: absolute;
    left: 50%;
    bottom: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 2em;
    width: 1em;
    font-size: 22px;
    color: #fff;
    border-radius: 2em;
    border: solid 2px;
    background-color: #fff;
    transition: .4s;
    &::after {
      content: '';
      width: 5px;
      height: 5px;
      background-color: #ff00a8;
      border-radius: 50%;
      animation: scroll-icon 2.2s infinite cubic-bezier(0.65, 0.05, 0.36, 1);
    }
  }

  @keyframes scroll-icon {
      0% { transform: translateY(-12px); opacity: 0; }
    30%, 70% { opacity: 1; }
    100% { transform: translateY(12px); opacity: 0; }
  }
</style>

<script>
export default {
  
}
</script>