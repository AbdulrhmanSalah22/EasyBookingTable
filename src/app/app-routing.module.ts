import { Component, NgModule } from '@angular/core';
import { ExtraOptions, RouterModule, Routes } from '@angular/router';
import { AboutUsComponent } from './about-us/about-us.component';
import { HomeComponent } from './home/home.component';
import { LoginComponent } from './login/login.component';
import { MealPageComponent } from './meal-page/meal-page.component';
import { MenuComponent } from './menu/menu.component';
import { RegisterationComponent } from './registeration/registeration.component';
import { TeamPageComponent } from './team-page/team-page.component';
import { OrderMealsComponent } from './order-meals/order-meals.component';
import { FavouriteComponent } from './favourite/favourite.component';
import { UserReservationComponent } from './user-reservation/user-reservation.component';
import { AuthGuardGuard } from './shared/guard/auth-guard.guard';


const routes: Routes = [
  {path:"home",component:HomeComponent},
  {path:"menu",component:MenuComponent},
  {path:'', redirectTo:'home' , pathMatch:'full'},
  {path:"aboutus",component:AboutUsComponent},
  {path:"ourteam",component:TeamPageComponent},
  {path:"signup",component:RegisterationComponent},
  {path:"signin",component:LoginComponent},
  {path:"menu/:name",component:MealPageComponent},
  {path:"order",component:OrderMealsComponent},
  {path:"favourite",component:FavouriteComponent},
  {path:"myreservation", canActivate:[AuthGuardGuard],component:UserReservationComponent},
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
