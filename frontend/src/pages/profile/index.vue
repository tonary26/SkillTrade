<script setup>
defineOptions({
  name: 'index'
})
</script>

<template>
  <div class="main">
    <div class="profile">

      <div class="left">
        <div class="avatar">
          <img class="img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJwAAACUCAMAAABRNbASAAAAaVBMVEX///8uNDb7+/sDExcoLzHq6upUWFkAAAArMTMfJiiio6QkKy0nLTDy8vIVHiHZ2toMGBsaIiXh4eIzOTuIiovOz8+BhIWpq6xgY2VvcnOanJ05PkCwsrLCw8RKT1A/REYABg2RlJR6fH1UUqySAAAEh0lEQVR4nO2ciZaqOBCGBQIkhCWAIIiA+P4POdJO38WlTRWk4szhe4L/hNReYbfb2Pjv4n5hW8UjRXWom1IqlZfN/lAVtvX8waEdhBKSccfhTOZKDO3JtqYb2eWs5FXWn3CpznVmW9kuq2XqPCWNa7tfNzkKwZ9rux6fEMfEnrZi8F4pu+EF1g6v78TP2hxHdL0VaW4Uvvyiv2GhFbs9vjCEe/IDvbbprKfNcUJydX2uq+16dsT3LnvtQR5hjNRm3VHqa7va7ECZDkyAjzqTRnTaKshHneGcLtA2b53vPfmFSlsVQrVd/QmVTbQga7ghahptWQm8cTN8pDm6SDNu/U1KE2OHGCNONhTaEoQ5zIQUiWf/JsF8hUcRYWuwk7uR7wnENagr5zgxwaVLBoQjmeGD+UtXjFhxo29cHMoFf4nrzAf/Ci2urAjE4bQRiUOenEMgLus++M4tsFbzeclH+7ldwHDiWGBeGzq2kuTCJ2RWoiiyTf+T87ndiEpL4oFCG7aGoCn6cdVXSVTzt4jvGrc02nYZpuIna5YEYFcnKDzwjex+YvMOLgnHOXtgfy6f6LTt3BJkE7IkHXSCesKUrcMvIJ5Ykff6J6Wt7Uit7WoUmuoURRvigWOqce94auHcZg7ybVIcCwuTrxtZ/LPR8jy2OEt3p/iHSCbkZHeRowrC57GMy7AxX0W/I2u79KH3L9Outb8dMZNFTeiJmP8Ly89hE32GtBnX7+tgHLuy7Lox2PfJ5y0NJUVR+P7n6drY2Nj4X+Im/jsSG7EiqU77S9sE72ia9rI/ZXQK/aruvFQIKWP2llhKkafesK/MT752SV+X5xzcs45Tb6x7s71Nf+okdBvnGyZkN5k7vmrv6RRcr+GpmszkeUnNge2bZ/JyZ1r/4yZRiJw/3JOeDysbb9agutQv5DWrTsGixxJmCTJfb2DiXtQiO3iEq7VmTUWz3BAeyJtVvErBVrKEO3XdChcvg+2O6iOGxeoyhVzAeY8UCx1yYercvtQNi+6dPxjUNo9OlkSLdkXX+wy1YAkWN7yEgB909sa1OVxge3glcg8Cghxx2moDgeER3EJixlYOqM/BzZ4Co17kNxIxiu2RGxpwQvAarNsQWMMN1kAz4xOJNdwQ0KODP3lYIA64OYFZgMADfCwBHeIvA+brEux6IQ4+QrKTnsjHfcMgJgF9OrWUHDAxTgJjuflzYkDW6WsvF6xFqp+wYzcf8Zz1Lx12ZxQPwJkMZHH1m1g/NSHX5nCmq80nttWZWNdcK2IXPKO9YNeT28NVnG4VdrAhTredGFkQp71WZEWcbum/idvEbeI2cT+I0/VzJxsRQjfbtBL4dWOra0OcdjPHQias/3woIq++AOvrBbm4XL+V416I7VVcAP3DiriKYKBpBGXv8PpRYd3DhBEaLCuB87mT+dHSL+B/C4mo+iXcQ7xKmGjODvmaI0oJbFZi/wDTD8adsQrQzxKSCbEqpw1n6XnRfweTKeBqfk2wsi4e58oJjks3rpLqcAmY8lYlZUF9qlbaVXNXZx1dGxsr8w+IZ1Ypg5LPuQAAAABJRU5ErkJggg==" alt="">
        </div>
        <div class="name">
          <span>Username</span>
        </div>
      </div>

      <div class="right">
        <div class="bio">
          <p>
            Я человек, который ценит развитие, осознанность и движение вперёд. Мне важно понимать,
            зачем я делаю те или иные вещи, и видеть результат своей работы — будь то обучение,
          </p>
        </div>
        <div class="skills-num">
          <span class="num">67</span>
          <span class="skills-num-title">SKILLS</span>
        </div>
        <button class="btn" type="submit">
          Edit Profile
        </button>
      </div>

    </div>
    <div class="skills">
      <div class="my-skills">
        <h3>My Skills</h3>
      </div>

      <div class="skills-list">
        <span class="skill">Frontend</span>
        <span class="skill">Backend</span>
        <span class="skill">DevOps</span>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .main {
    color: white;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
  }

  .profile {
    display: flex;
    margin-top: 100px;
    width: 1000px;
    height: 270px;
    background-color: black;
    border-radius: 40px;
  }

  .left {
    margin-left: 60px;
    text-align: center;
  }

  .img {
    border-radius: 100px;
    border: 3px solid white;
    width: 97px;
    margin-top: 50px;
  }

  .name {
    margin-top: 20px;
    font-size: 17px;
    font-weight: 400;
  }

  .right {
    margin-left: 30px;
  }

  .bio {
    margin-top: 30px;
    max-width: 600px;
    width: 100%;
    line-height: 1.6;
    font-size: 14px;
    font-weight: 300;
  }

  .skills-num {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
    font-size: 16px;
  }

  .num {
    font-weight: bold;
  }

  .skills-num-title {
    font-size: 13px;
    font-weight: 500;
    color: #787878;
  }

  .btn {
    margin-top: 40px;
    background-color: black;
    border: 1px solid #292929;
    border-radius: 10px;
    width: 110px;
    height: 35px;
    color: white;
    cursor: pointer;
  }

  .skills {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
  }

  .skills-list {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
  }

  .skill {
    background-color: #1c1c1c;
    padding-right: 20px;
    padding-left: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
    font-weight: 300;
    border-radius: 50px;
  }
</style>