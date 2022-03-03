import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Meal } from '../model/meal';

@Injectable({
  providedIn: 'root'
})
export class FavouriteService {
 FevArray:Meal[]=[]

  sendfev(id:any):Observable<Meal>{
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    return this.Http.post<Meal>('http://localhost:8000/api/check',id,{headers});
  }

  getFev():Observable<Meal[]>{
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    return this.Http.get<Meal[]>('http://localhost:8000/api/get-meal',{headers});
  }

  deleteFev(id:any):Observable<Meal>{
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    return this.Http.post<Meal>(`http://localhost:8000/api/get-meal/${id}`,'blog',{headers});
  }

  addToLocalFev(meal: Meal){
    var index = this.FevArray.findIndex((x) => x.id == meal.id);
    if (index === -1) {
      this.FevArray.push(meal);
    }
    const res = this.FevArray;
    return res;
  }

  constructor(private Http: HttpClient) { }
}
