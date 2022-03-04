import { Component, OnInit } from '@angular/core';
import { Meal } from '../shared/model/meal';
import { FavouriteService } from '../shared/service/favourite.service';
import { MealService } from '../shared/service/meal.service';
import { OrderService } from '../shared/service/order.service';

@Component({
  selector: 'app-favourite',
  templateUrl: './favourite.component.html',
  styleUrls: ['./favourite.component.css'],
})
export class FavouriteComponent implements OnInit {
  MainFavArray!: Array<any>;
  FevArray!: Array<Meal>;

  constructor(
    private MealService: MealService,
    private OrderService: OrderService,
    private FavouriteService: FavouriteService
  ) {}

  ngOnInit(): void {
    this.getfev();
  }
  getfev() {
    if (localStorage.getItem('toke')) {
      this.FavouriteService.getFev();
      this.FavouriteService.MainFavArray.subscribe((fev) => {
        this.MainFavArray = fev;
      });
    } else {
      this.FevArray = this.FavouriteService.FevArray;
      console.log(this.FevArray);
    }
  }
  delete(meal: Meal) {
    if (localStorage.getItem('toke')) {
      this.FavouriteService.deleteFev(meal.id).subscribe(
        (next) => {
          this.getfev();
        },
        (error) => {
          console.log(error);
        }
      );
    } else {
      this.FavouriteService.delFromLocalFev(meal)
    }
  }
  ShowMeal(meal: Meal) {
    this.MealService.display(meal);
  }
}
