<template>
  <div class="c-puzzle">
    <div class="c-puzzle__grid" ref="puzzleContainer">
      <div class="c-puzzle__item c-puzzle__item--rotateable" data-item-number="1" data-rotation="0" @click.stop="handleClick" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave">
        <div class="c-puzzle__item-inner">
            <GradientCircle/>
        </div>
      </div>
      <div class="c-puzzle__item c-puzzle__item--first-letter" data-item-number="2" data-rotation="0" @click.stop="handleClick" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave">
        <div class="c-puzzle__item-inner">{{ firstLetter }}</div>
      </div>
      <!-- <div class="c-puzzle__item c-puzzle__item--empty" ref="emptyElement" data-item-number="" data-rotation="0" @click.stop="handleClick">
      </div> -->
      <div class="c-puzzle__item c-puzzle__item--rotateable" data-item-number="3" data-rotation="0" @click.stop="handleClick" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave">
        <div class="c-puzzle__item-inner">
          <GradientSquare/>
        </div>
      </div>
      <div class="c-puzzle__item c-puzzle__item--rotateable" data-item-number="4" data-rotation="0" @click.stop="handleClick" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave">
        <div class="c-puzzle__item-inner">
          <GradientCircleSlice/>
        </div>
      </div>
      <div class="c-puzzle__item c-puzzle__item--second-letter" data-item-number="5" data-rotation="0" @click.stop="handleClick" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave">
        <div class="c-puzzle__item-inner">{{ secondLetter }}</div>
      </div>
      <div class="c-puzzle__item c-puzzle__item--rotateable" data-item-number="6" data-rotation="0" @click.stop="handleClick" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave">
        <div class="c-puzzle__item-inner">
          <GradientDoubleHalfCircles/>
        </div>
      </div>
      <div class="c-puzzle__item c-puzzle__item--rotateable" data-item-number="7" data-rotation="0" @click.stop="handleClick" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave">
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
      <div class="c-puzzle__item c-puzzle__item--rotateable" data-item-number="8" data-rotation="0" @click.stop="handleClick" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave">
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
@import "../../assets/css/breakpoints.scss";
.c-puzzle {
  width: 100%;
  height: 100%;
  .c-puzzle__grid {
    position: relative;
    width: 100%;
    height: 0;
    padding-bottom: 100%;
    @include media(">tablet") {
      height: 100%;
    }
  }
  &__item {
    position: absolute;
    width: calc(100% / 3);
    left: 0%;
    top: 0%;
    height: calc(100% / 3);
    transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    cursor: pointer;
    @include media(">tablet") {
      padding-bottom: calc(100% / 3);
    }
  }
  &__item-inner {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    font-size: 24vw;
    color: #fff;
    overflow: hidden;
    //background-color: #fff;
    @include media(">tablet") {
      position: absolute;
      font-size: 12vw;
    }
    &::selection {
      background-color: rgba(0, 0, 0,.0);
    }
  }
  svg {
    width: 100%;
    pointer-events: none;
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
    const baseDistance = 100;
    return {
      firstLetter: 'L',
      secondLetter: 'T',
      letters: ['L', 'E', 'H', 'E', 'T', 'Ő', 'S', 'É', 'G', 'E', 'K', 'T', 'E', 'R', 'E'],
      parentHeight: 0,
      tileMap: {
        1: {
          tileNumber: 1,
          position: 1,
          top: 0,
          left: 0,
          rotation: 0
        },
        2: {
          tileNumber: 2,
          position: 2,
          top: 0,
          left: baseDistance * 1,
          rotation: 0
        },
        3: {
          tileNumber: 3,
          position: 4,
          top: baseDistance,
          left: 0,
          rotation: 0
        },
        4: {
          tileNumber: 4,
          position: 5,
          top: baseDistance,
          left: baseDistance,
          rotation: 0
        },
        5: {
          tileNumber: 5,
          position: 6,
          top: baseDistance,
          left: baseDistance * 2  ,
          rotation: 0
        },
        6: {
          tileNumber: 6,
          position: 7,
          top: baseDistance * 2,
          left: 0,
          rotation: 0
        },
        7: {
          tileNumber: 7,
          position: 8,
          top: baseDistance * 2,
          left: baseDistance,
          rotation: 0
        },
        8: {
          tileNumber: 8,
          position: 9,
          top: baseDistance * 2,
          left: baseDistance * 2,
          rotation: 0
        },
        empty: {
          position: 3,
          top: 0,
          left: baseDistance * 2,
          rotation: 0
        }
      },
      history: [],
      delay: -50
    }
  },
  mounted() {
    this.matchParentHeight();

    const tiles = document.querySelectorAll('.c-puzzle__item');
    for(var i = 0; i < tiles.length; i++) {
      const tileId = tiles[i].innerHTML;
      this.delay += 50;
      setTimeout(this.setup, this.delay, tiles[i]);
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

    matchParentHeight() {
      const parentHeight = this.$refs.puzzleContainer.clientHeight;
      this.parentHeight = parentHeight; 
    },
    
    setup(tile) {
      const tileId = tile.dataset.itemNumber;
      const xMovement = this.tileMap[tileId].left;
      const yMovement = this.tileMap[tileId].top;
      const translateString = `translateX(${xMovement}%) translateY(${yMovement}%) rotateZ(0deg)`;
      tile.style.webkitTransform = translateString;
    },

    movementMap(position) {
      if (position == 9) return [6, 8];
      if (position == 8) return [5, 7, 9];
      if (position == 7) return [4, 8];
      if (position == 6) return [3, 5, 9];
      if (position == 5) return [2, 4, 6, 8];
      if (position == 4) return [1, 5, 7];
      if (position == 3) return [2, 6];
      if (position == 2) return [1, 3, 5];
      if (position == 1) return [2, 4];
    },

    moveTile(tile, recordHistory = true) {
      const tileNumber = tile.dataset.itemNumber;
      if (!this.tileMovable(tileNumber)) {
        const regex = 'rotateZ\\((.*)deg';
        let rotation = tile.style.transform.match(regex)[1];
        rotation = (parseInt(rotation) + 90).toString();
        const xMovement = this.tileMap[tileNumber].left;
        const yMovement = this.tileMap[tileNumber].top;
        const translateString = `translateX(${xMovement}%) translateY(${yMovement}%) rotateZ(${rotation}deg)`;
        tile.style.webkitTransform = translateString;
        this.tileMap[tileNumber].rotation = parseInt(rotation);
        return;
      }
      if (recordHistory == true) {
        if (this.history.length >= 3) {
          if (this.history[this.history.length-1] != this.history[this.history.length-3]) this.history.push(tileNumber);
          } else {
            this.history.push(tileNumber);
          }
      }
      const emptyTop = this.tileMap.empty.top;
      const emptyLeft = this.tileMap.empty.left;
      const emptyPosition = this.tileMap.empty.position;
      this.tileMap.empty.top = this.tileMap[tileNumber].top;
      this.tileMap.empty.left = this.tileMap[tileNumber].left;
      this.tileMap.empty.position = this.tileMap[tileNumber].position;

      const regex = 'rotateZ\\((.*)deg';
      let rotation = this.tileMap[tileNumber].rotation;
      // rotation = (parseInt(rotation) + 90).toString();

      const xMovement = emptyLeft;
      const yMovement = emptyTop;
      const translateString = `translateX(${xMovement}%) translateY(${yMovement}%) rotateZ(${rotation}deg)`;
      tile.style.webkitTransform = translateString;

      this.tileMap[tileNumber].top = emptyTop;
      this.tileMap[tileNumber].left = emptyLeft;
      this.tileMap[tileNumber].position = emptyPosition;
    },

    tileMovable(tileNumber) {
      const selectedTile = this.tileMap[tileNumber];
      const emptyTile = this.tileMap.empty;
      const movableTiles = this.movementMap(emptyTile.position);
      if (movableTiles.includes(selectedTile.position)) {
        return true;
      } else {
        return false;
      };
    },

    handleClick(event) {
      const targetElement = event.currentTarget;
      const tileNumber = targetElement.dataset.itemNumber;
      this.moveTile(targetElement);
    },

    handleMouseOver(event) {
      const targetElement = event.currentTarget;
      const tileNumber = targetElement.dataset.itemNumber;
      const oldTransformString = targetElement.style.transform;
      const regex = 'rotateZ\\((.*)deg';
      let rotation = oldTransformString.match(regex)[1];
      const yMovement = this.tileMap[tileNumber].top;
      const xMovement = this.tileMap[tileNumber].left;
      const newTransformString = `translateX(${xMovement}%) translateY(${yMovement}%) rotateZ(${rotation}deg) scale(0.90)`;
      targetElement.style.zIndex = '1';
      targetElement.style.webkitTransform = newTransformString;
    },

    handleMouseLeave(event) {
      const targetElement = event.currentTarget;
      const tileNumber = targetElement.dataset.itemNumber;
      const oldTransformString = targetElement.style.transform;
      const regex = 'rotateZ\\((.*)deg';
      let rotation = oldTransformString.match(regex)[1];
      const yMovement = this.tileMap[tileNumber].top;
      const xMovement = this.tileMap[tileNumber].left;
      const newTransformString = `translateX(${xMovement}%) translateY(${yMovement}%) rotateZ(${rotation}deg) scale(1)`;
      targetElement.style.zIndex = '0';
      targetElement.style.webkitTransform = newTransformString;
    }
  },
}
</script>