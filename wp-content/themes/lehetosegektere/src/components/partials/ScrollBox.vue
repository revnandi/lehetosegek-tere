<template>
  <div class="c-scroll-box" :style="{ height: this.height }">
    <div ref="scrollContainer" class="c-scroll-box__inner">
      <slot></slot>
    </div>
      <div ref="scrollBar" class="c-scroll-box__bar">
        <div ref="scrollKnob" class="c-scroll-box__knob"></div>
      </div>
  </div>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/breakpoints.scss";
  .c-scroll-box {
    $self: &;
    position: relative;
    height: 29.8vw;
    padding: 0 1.150vw;
    background-color: #fff;
    overflow: hidden;
    @include media("<=tablet") {
      font-size: 4.267vw;
    }
    @include media(">tablet") {
      font-size: 1.300vw;
    }
    &--hero {
      height: 0!important;
      @include media("<=tablet") {
        padding: 0 1.150vw 100% 1.150vw;
      }
      @include media(">tablet") {
        padding: 0 1.150vw calc((100% / 3) * 1) 1.150vw;
      }
      #{ $self }__inner {
        position: absolute;
      }
    }
    &__inner {
      position: relative;
      height: 100%;
      width: calc(100% - 1.150vw);
      padding: 1.15vw 3.500vw 1.15vw 0;
      background-color: #fff;
      overflow-y: auto;
      -webkit-overflow-scrolling: touch;
      &::-webkit-scrollbar {
        display: none;
      }
    }
    &__bar {
      position: absolute;
      top: 1.150vw;
      right: 1.75vw;
      bottom: 16px;
      width: 2px;
      height: calc(100% - (1.150vw * 2));
      background: #575757;
      border-radius: 4px;
    }
    &__knob {
      position: absolute;
      top: 0;
      left: 50%;
      width: 0.500vw;
      height: 0.500vw;
      border-radius: 50%;
      background: rgb(253,29,29);
      background: linear-gradient(0deg, rgba(253,29,29,1) 0%, rgba(250,82,244,1) 100%);
      transform: translate(-50%, -50%);
      will-change: top;
      cursor: pointer;
      @include media("<=tablet") {
        width: 1.500vw;
        height: 1.500vw;
      }
      @include media(">tablet") {
        width: 0.500vw;
        height: 0.500vw;
      }
    }
  }
</style>

<script>
export default {
  props: {
    height: {
      type: String,
      default: 'auto'
    }
  },
  data() {
    return {
      dragging: false
    }
  },
  methods: {
    onContainerScroll() {
      if (this.dragging) return;
      
      // Otherwise, set the knob position based on the scroll position
      this.$refs.scrollKnob.style.top = this.$refs.scrollContainer.scrollTop / (this.$refs.scrollContainer.scrollHeight - this.$refs.scrollContainer.offsetHeight) * 100 + '%';
    },
    onKnobMouseDown(event) {
      this.dragging = {
        x: event.clientX,
        y: event.clientY
      };
    },
    onWindowMouseMove(event) {
      if (this.dragging) {
        // When dragging
        event.preventDefault();
        let diff = {
          x: event.clientX - this.dragging.x,
          y: event.clientY - this.dragging.y
        };
        
        let newTop = Math.max(0, Math.min(this.$refs.scrollKnob.offsetTop + diff.y, this.$refs.scrollBar.offsetHeight))
        this.$refs.scrollKnob.style.top = newTop + 'px';
        
        let scrollOffset = newTop / this.$refs.scrollBar.offsetHeight * (this.$refs.scrollContainer.scrollHeight - this.$refs.scrollContainer.offsetHeight)
        this.$refs.scrollContainer.scrollTop = scrollOffset;
        
        this.dragging = {
          x: event.clientX,
          y: event.clientY
        };
      };
    },
    onWindowMouseUp() {
      this.dragging = false;
    }
  },
  mounted() {
    this.$refs.scrollContainer.addEventListener('scroll', this.onContainerScroll);
    this.$refs.scrollKnob.addEventListener('mousedown', this.onKnobMouseDown);
    window.addEventListener('mousemove', this.onWindowMouseMove);
    window.addEventListener('mouseup', this.onWindowMouseUp);
  }
}
</script>