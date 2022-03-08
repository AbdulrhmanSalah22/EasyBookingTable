import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Category } from '../model/category';
import { MealService } from './meal.service';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root',
})
export class CategoryService {
  cat!: any;
  constructor(private Http: HttpClient, private MealService: MealService) {}

  getAll() {
    return this.Http.get<Category>(environment.Api+'get-cat', {
      headers: new HttpHeaders({ token: 'hello' }),
    });
  }
  getById() {
    return this.Http.get<Category>(
      environment.Api+`category/${this.MealService.SelectedMeal.category_id}`
    );
  }
}
