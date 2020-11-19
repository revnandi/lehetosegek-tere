<template>
  <div class="c-puzzle">
    <div class="c-puzzle__grid">
      <div class="c-puzzle__item c-puzzle__item--rotateable" data-position="0" data-rotation="0" @click="handleClick">
        <div class="c-puzzle__item-inner">
            <GradientCircle/>
        </div>
      </div>
      <div class="c-puzzle__item c-puzzle__item--first-letter" data-position="1" data-rotation="0" @click="handleClick">
        <div class="c-puzzle__item-inner">{{ firstLetter }}</div>
      </div>
      <div class="c-puzzle__item c-puzzle__item--empty" ref="emptyElement" data-position="2" data-rotation="0" @click="handleClick">
      </div>
      <div class="c-puzzle__item c-puzzle__item--rotateable" data-position="3" data-rotation="0" @click="handleClick">
        <div class="c-puzzle__item-inner">
          <GradientSquare/>
        </div>
      </div>
      <div class="c-puzzle__item c-puzzle__item--rotateable" data-position="4" data-rotation="0" @click="handleClick">
        <div class="c-puzzle__item-inner">
          <GradientCircleSlice/>
        </div>
      </div>
      <div class="c-puzzle__item c-puzzle__item--second-letter" data-position="5" data-rotation="0" @click="handleClick">
        <div class="c-puzzle__item-inner">{{ secondLetter }}</div>
      </div>
      <div class="c-puzzle__item c-puzzle__item--rotateable" data-position="6" data-rotation="0" @click="handleClick">
        <div class="c-puzzle__item-inner">
          <GradientDoubleHalfCircles/>
        </div>
      </div>
      <div class="c-puzzle__item c-puzzle__item--rotateable" data-position="7" data-rotation="0" @click="handleClick">
        <div class="c-puzzle__item-inner">
          <svg class="c-puzzle__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100">
            <defs>
              <linearGradient id="linear-gradient-a" y1="50" x2="100" y2="50" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#f9101e"/>
                <stop offset="1" stop-color="#e83895"/>
              </linearGradient>
            </defs>
            <g id="Layer_2" data-name="Layer 2">
              <g id="Layer_1-2" data-name="Layer 1">
                <path d="M100,50V0H0V100H50A50,50,0,0,1,100,50Z" style="fill: url(#linear-gradient-a)"/>
              </g>
            </g>
          </svg>
        </div>
      </div>
      <div class="c-puzzle__item c-puzzle__item--rotateable" data-position="8" data-rotation="0" @click="handleClick">
        <div class="c-puzzle__item-inner">
          <svg class="c-puzzle__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 200 200">
            <defs>
              <linearGradient id="linear-gradient-b" y1="100" x2="200" y2="100" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#e83895"/>
                <stop offset="1" stop-color="#e83df5"/>
              </linearGradient>
            </defs>
            <g id="Layer_2" data-name="Layer 2">
              <g id="Layer_1-2" data-name="Layer 1">
                <path d="M0,0V100A100,100,0,0,1,100,200H200V0Z" style="fill: url(#linear-gradient-b)"/>
              </g>
            </g>
          </svg>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.c-puzzle {
  width: 100%;
  .c-puzzle__grid {
  width: 100%;
  padding: 8px;
    &:after {
      content: '';
      clear: both;
      display: block;
    }
  }
  &__item {
    width: calc(100% / 3);
    float: left;
    position: relative;
    padding-bottom: calc(100% / 3);
    transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    cursor: pointer;
  }
  &__item-inner {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    font-size: 12vw;
    color: #fff;
    overflow: hidden;
    //background-color: #fff;
    &::selection {
      background-color: rgba(0, 0, 0,.0);
    }
  }
  &__circle {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: rgb(235,107,45);
    background: -moz-linear-gradient(180deg, rgba(235,107,45,1) 0%, rgba(249,16,30,1) 100%);
    background: -webkit-linear-gradient(180deg, rgba(235,107,45,1) 0%, rgba(249,16,30,1) 100%);
    background: linear-gradient(180deg, rgba(235,107,45,1) 0%, rgba(249,16,30,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eb6b2d",endColorstr="#f9101e",GradientType=1);
  }
  &__square {
    width: 100%;
    height: 100%;
    background: rgb(255,0,253);
    background: -moz-linear-gradient(0deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    background: -webkit-linear-gradient(0deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    background: linear-gradient(0deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff00fd",endColorstr="#f9101e",GradientType=1);
  }
  &__rounded-square {
    width: 100%;
    height: 100%;
    border-radius: 0 100% 0 0;
    background: rgb(255,0,253);
    background: -moz-linear-gradient(-90deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    background: -webkit-linear-gradient(-90deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    background: linear-gradient(-90deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff00fd",endColorstr="#f9101e",GradientType=1);
  }
  &__double-circles {
    position: relative;
    width: 100%;
    height: 100%;
    &::after {
      content: '';
      position: absolute;
      left: -50%;
      width: 100%;
      height: 100%;
      border-radius: 100%;
      background: rgb(235,107,45);
      background: -moz-linear-gradient(180deg, rgba(235,107,45,1) 0%, rgba(249,16,30,1) 100%);
      background: -webkit-linear-gradient(180deg, rgba(235,107,45,1) 0%, rgba(249,16,30,1) 100%);
      background: linear-gradient(180deg, rgba(235,107,45,1) 0%, rgba(249,16,30,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eb6b2d",endColorstr="#f9101e",GradientType=1);
    }
    &::before {
      content: '';
      position: absolute;
      right: -50%;
      width: 100%;
      height: 100%;
      border-radius: 100%;
      background: rgb(235,107,45);
      background: -moz-linear-gradient(0deg, rgba(235,107,45,1) 0%, rgba(249,16,30,1) 100%);
      background: -webkit-linear-gradient(0deg, rgba(235,107,45,1) 0%, rgba(249,16,30,1) 100%);
      background: linear-gradient(0deg, rgba(235,107,45,1) 0%, rgba(249,16,30,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eb6b2d",endColorstr="#f9101e",GradientType=1);
    }
  }
  &__square-cutout-a {
    position: relative;
    width: 100%;
    height: 100%;
    background: rgb(232,56,149);
    background: -moz-linear-gradient(270deg, rgba(232,56,149,1) 0%, rgba(249,16,30,1) 100%);
    background: -webkit-linear-gradient(270deg, rgba(232,56,149,1) 0%, rgba(249,16,30,1) 100%);
    background: linear-gradient(270deg, rgba(232,56,149,1) 0%, rgba(249,16,30,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#e83895",endColorstr="#f9101e",GradientType=1);
    &::after {
      content: '';
      position: absolute;
      left: 50%;
      top: 50%;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background: #66c79a;
    }
  }
  &__svg {
    width: 100%;
  }
}
</style>

<script>
import GradientSquare from "./VisualElements/GradientSquare";
import GradientCircle from "./VisualElements/GradientCircle";
import GradientCircleSlice from "./VisualElements/GradientCircleSlice";
import GradientDoubleHalfCircles from "./VisualElements/GradientDoubleHalfCircles";

export default {
  components: {
    GradientSquare,
    GradientCircle,
    GradientCircleSlice,
    GradientDoubleHalfCircles
  },
  data() {
    return {
      firstLetter: 'L',
      secondLetter: 'T',
      letters: ['L', 'E', 'H', 'E', 'T', 'Ő', 'S', 'É', 'G', 'E', 'K', 'T', 'E', 'R', 'E']
    }
  },
  methods: {
    shuffleFirstLetter: function() {
      this.firstLetter = this.letters[Math.floor(Math.random() * this.letters.length)];
    },
    shuffleSecondLetter: function() {
      this.secondLetter = this.letters[Math.floor(Math.random() * this.letters.length)];
    },
    rotateItem: function(event) {
      let currentRotationAngle = parseInt(event.currentTarget.dataset.rotation);
      let newAngle = currentRotationAngle+90;
      event.currentTarget.dataset.rotation = newAngle;
      event.currentTarget.style.transform = `rotateZ(${newAngle}deg)`;
    },
    checkAdjacent: function(element) {
      let elementPosition = element.dataset.position;
      const emptyItemPosition = this.$refs.emptyElement.dataset.position;
      // console.log(emptyItemPosition)
      console.log('elementPosition ' + elementPosition);
      if (elementPosition=== '1') {
        if(emptyItemPosition === '2') {
          element.style.transform = 'translateX(100%)';
          element.dataset.position = '2';
          this.$refs.emptyElement.dataset.position = '1';
          console.log(this.$refs.emptyElement.dataset.position);
        }
      } else if (elementPosition=== '2') {
        console.log('elementPosition === 2')
        if(emptyItemPosition === '1') {
          element.style.transform = 'translateX(0)';
          element.dataset.position = '1';
          this.$refs.emptyElement.dataset.position = '2';
          console.log(this.$refs.emptyElement.dataset.position);
        }
      } else {
        if (element.classList.contains('c-puzzle__item--first-letter')) {
          this.shuffleFirstLetter();
        }
        if (element.classList.contains('c-puzzle__item--second-letter')) {
          this.shuffleSecondLetter();
        }
        if (element.classList.contains('c-puzzle__item--rotateable')) {
          this.rotateItem(event);
        }
      }
    },
    handleClick: function(event) {
      const element = event.currentTarget;
      this.checkAdjacent(element);
      // if (element.classList.contains('c-puzzle__item--first-letter')) {
      //   this.shuffleFirstLetter();
      // }
      // if (element.classList.contains('c-puzzle__item--second-letter')) {
      //   this.shuffleSecondLetter();
      // }
      // if (element.classList.contains('c-puzzle__item--rotateable')) {
      //   this.rotateItem(event);
      // }
    }
  },
}
</script>