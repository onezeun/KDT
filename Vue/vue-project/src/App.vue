<template>
  <v-app>
    <!-- 앱바 테마를 primary(파란색)로 설정 -->
    <v-app-bar app color="primary" dark>
      <!-- 좌측에 메뉴 아이콘 생성 -->
      <v-app-bar-nav-icon @click.stop="bDrawer = !bDrawer"></v-app-bar-nav-icon>
      <v-toolbar-title>멀티 페이지</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
    </v-app-bar>

    <!-- bDrawer가 True이면 탐색 서랍 사용하도록 바인딩 -->
    <v-navigation-drawer absolute temporary v-model="bDrawer">
      <!-- 안쪽 툴바에 플랫 스타일로 메뉴 제목 작성 -->
      <v-toolbar flat height="70px">
        <v-list>
          <v-list-item>
            <v-list-item-avatar>
              <img src="images/avatar.png">
            </v-list-item-avatar>
            <v-list-item-content>
              <v-list-item-title class="title">홍길동</v-list-item-title>
              <v-list-item-subtitle>로그인</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-toolbar>
      <v-divider></v-divider>

      <!-- 제목 밑에 메뉴명을 목록으로 작성. 안쪽여백은 pt-3으로 설정 -->
      <v-list class="pt-3">
        <v-list-item to="/">
          <v-list-item-action>
            <v-icon>mdi-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>HOME</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>

      <v-list class="pt-3">
        <v-list-item to="/main">
          <v-list-item-action>
            <v-icon>mdi-folder</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>MAIN</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>

      <v-list class="pt-3">
        <v-list-item to="/sub">
          <v-list-item-action>
            <v-icon>mdi-folder-check-outline</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>SUB</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <!-- 내용영역에 라우터 페이지 렌더링 -->
    <v-main>
      <!-- 페이지 장면전환 효과 -->
      <v-slide-x-transition mode="out-in">
        <router-view></router-view>
      </v-slide-x-transition>
    </v-main>

    <!-- footer 영역 테마를 secondary로 설정 -->
    <v-footer color="secondary" fixed dark>
      <div class="mx-auto">Create By VueJS</div>
    </v-footer>
  </v-app>
</template>

<script>

export default {
  name: 'App',

  data: () => ({
    bDrawer: false,
  }),
};
</script>
