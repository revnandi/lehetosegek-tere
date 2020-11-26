<template>
  <div class="c-scroll-icon" :class="{ 'c-scroll-icon--visible': isVisible }"></div>
</template>

<style lang="scss" scoped>
  .c-scroll-icon {
    z-index: 2;
    position: absolute;
    left: 50%;
    bottom: -1.875vw;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 1.875vw;
    width: 1vw;
    font-size: 22px;
    color: #fff;
    border-radius: 2em;
    border: solid 2px;
    background-color: #fff;
    opacity: 0;
    transition: .4s cubic-bezier(0.22, 1, 0.36, 1);
    &::after {
      content: '';
      width: 0.325vw;
      height: 0.325vw;
      background-color: #ff00a8;
      border-radius: 50%;
      animation: scroll-icon 2.2s infinite cubic-bezier(0.65, 0.05, 0.36, 1);
    }
    &--visible {
      opacity: 1;
    }
  }

  @keyframes scroll-icon {
      0% { transform: translateY(-150%); opacity: 0; }
    30%, 70% { opacity: 1; }
    100% { transform: translateY(150%); opacity: 0; }
  }
</style>

<script>
export default {
  props: {
    isVisible: {
      type: Boolean,
      default: true
    }
  }
}
</script>