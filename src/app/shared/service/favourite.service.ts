import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Meal } from '../model/meal';

@Injectable({
  providedIn: 'root'
})
export class FavouriteService {
  sendfev(id:any):Observable<Meal>{
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    return this.Http.post<Meal>('http://localhost:8000/api/check1',id,{headers});
  }

  getFev():Observable<Meal[]>{
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    return this.Http.get<Meal[]>('http://localhost:8000/api/get-meal',{headers});
  }

  deleteFev(id:any):Observable<Meal>{
    return this.Http.delete<Meal>(`http://localhost:8000/api/get-meal/${id}`);
  }

  constructor(private Http: HttpClient) { }
}
