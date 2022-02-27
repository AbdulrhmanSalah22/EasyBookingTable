import { Component, NgModule } from '@angular/core';
import { ExtraOptions, RouterModule, Routes } from '@angular/router';
import { AboutUsComponent } from './about-us/about-us.component';
import { HomeComponent } from './home/home.component';
import { LoginComponent } from './login/login.component';
import { MenuComponent } from './menu/menu.component';
import { OrderMealsComponent } from './order-meals/order-meals.component';
import { RegisterationComponent } from './registeration/registeration.component';
import { TeamPageComponent } from './team-page/team-page.component';


const routes: Routes = [
  {path:"home",component:HomeComponent},
  {path:"menu",component:MenuComponent},
  {path:'' , redirectTo:'home' , pathMatch:'full'},
  {path:"aboutus",component:AboutUsComponent},
  {path:"ourteam",component:TeamPageComponent},
  {path:"signup",component:RegisterationComponent},
  {path:"signin",component:LoginComponent},
  {path:"order",component:OrderMealsComponent},
  {path:"**",component:HomeComponent},


];
const routerOptions:ExtraOptions={
  scrollPositionRestoration:'enabled',
  anchorScrolling:'enabled',
}
@NgModule({
  imports: [RouterModule.forRoot(routes,routerOptions)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
