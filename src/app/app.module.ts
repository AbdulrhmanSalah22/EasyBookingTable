import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './Layouts/header/header.component';
import { FooterComponent } from './Layouts/footer/footer.component';
import { HomeComponent } from './home/home.component';
import { WelcomeComponent } from './home/welcome/welcome.component';
import { CategoriesComponent } from './categories/categories.component';
import { CategoryComponent } from './categories/category/category.component';
import { SliderComponent } from './home/slider/slider.component';
import { SpecialDishesComponent } from './home/special-dishes/special-dishes.component';
import { MenuComponent } from './menu/menu.component';
import { MenuCategoriesComponent } from './menu/menu-categories/menu-categories.component';
import { MenuMealsComponent } from './menu/menu-categories/menu-meals/menu-meals.component';
import { AboutUsComponent } from './about-us/about-us.component';
import { ReservationComponent } from './home/reservation/reservation.component';
import { TeamPageComponent } from './team-page/team-page.component';
import { RegisterationComponent } from './registeration/registeration.component';
import { LoginComponent } from './login/login.component';
import {HttpClientModule} from '@angular/common/http'
import { FormsModule } from '@angular/forms';
import { MealPageComponent } from './meal-page/meal-page.component';
import { SelectedMealComponent } from './meal-page/selected-meal/selected-meal.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    HomeComponent,
    WelcomeComponent,
    CategoriesComponent,
    CategoryComponent,
    SliderComponent,
    SpecialDishesComponent,
    MenuComponent,
    MenuCategoriesComponent,
    MenuMealsComponent,
    AboutUsComponent,
    ReservationComponent,
    TeamPageComponent,
    RegisterationComponent,
    LoginComponent,
    MealPageComponent,
    SelectedMealComponent,
  ],
  imports: [BrowserModule, AppRoutingModule,HttpClientModule,FormsModule],
  providers: [],
  bootstrap: [AppComponent],
})
export class AppModule {}
